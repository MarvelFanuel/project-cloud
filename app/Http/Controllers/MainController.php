<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\User;
use App\Utils\HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{
    use HttpResponse;
    public function index()
    {
        $data['title'] = 'Kepanitiaan CloudComp';
        return view('user.home', $data);
    }
    public function biodata()
    {
        $data['divisions'] = Division::all();
        $data['title'] = 'Biodata';
        return view('user.forms.biodata', $data);
    }
    public function files()
    {
        $data['files'] = User::where('email', session('email'))->select('ktm', 'grade', 'skkk', 'photo', 'cheats')->first();
        $data['divisions'] = Division::all();
        $data['title'] = 'Berkas';
        return view('user.forms.files', $data);
    }

    public function schedule()
    {
        $data['title'] = 'Interview';
        return view('user.forms.schedule', $data);
    }
    public function project()
    {
        $data['title'] = 'Project';
        $data['applicant'] = User::where('email', session('email'))->with(['choice1', 'choice2'])->first()->toArray();
        return view('user.forms.project', $data);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('index');
    }
}
