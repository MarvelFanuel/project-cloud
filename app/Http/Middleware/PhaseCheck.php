<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PhaseCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, int $phase): Response
    {
        // Checking the phase of Candidate
        if (!session('email')) {
            return redirect()->route('login')->with('error', 'You must log in first!');
        }

        // if (session('phase') < 3) {
        //     return redirect()->route('login')->with('error', 'Registration Closed 😮‍💨');
        // }

        if (session('phase') < 3) {
            if (session('phase') < $phase) {
                return redirect()->back()->with('phaseCheck', 'The form is not accessible yet. Please complete the current form first!');
            } else if (session('phase') > $phase) {
                return redirect()->back()->with('phaseCheck', 'You have already filled out this form. If you need to make any changes, please contact our official Line account!');
            }
        } elseif (((session('phase') == 4) && ($phase >= 2)) || ((session('phase') == 3) && ($phase == 2 || $phase == 3))) {
            return $next($request);
        } elseif ((session('phase') >= 3) && $phase < 2) {
            if (session('phase') > $phase) {
                return redirect()->back()->with('phaseCheck', 'You have already filled out this form. If you need to make any changes, please contact our official Line account!');
            }
        } elseif (session('phase') < 3 && $phase == 4) {
            return redirect()->back()->with('phaseCheck', 'Please finish your interview to proceed onto the next step!');
        }
        return $next($request);
    }
}
