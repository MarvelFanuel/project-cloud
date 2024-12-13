@extends('user.layout')


@section('head')
    <style>
        * {
            user-select: none;
            -ms-user-select: none;
            -webkit-user-select: none;
            -moz-user-select: none;
        }

        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            min-width: 100vw;
            background: var(--tosca);
            background-image:
                linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                radial-gradient(at 0% 0%, var(--purple-dark) 0px, transparent 50%),
                radial-gradient(at 80% 2%, var(--tosca) 0px, transparent 50%),
                radial-gradient(at 41% 28%, var(--red) 0px, transparent 50%),
                radial-gradient(at 0% 57%, var(--purple) 0px, transparent 50%),
                radial-gradient(at 80% 58%, var(--yellow) 0px, transparent 50%),
                radial-gradient(at 80% 83%, var(--neutral) 0px, transparent 50%),
                radial-gradient(at 0% 100%, var(--magenta) 0px, transparent 50%);
            position: relative;
            background-size: 200% 200%;
        }

        .logo {
            filter: drop-shadow(0 0 5px white) drop-shadow(0 0 35px white);
        }

        .login-container {
            box-shadow: 0 0 10px white;
            backdrop-filter: brightness(3.0);
        }
    </style>
@endsection


@section('content')
    @if (session()->has('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Login Failed',
                text: '{{ session('error') }}'
            });
        </script>
    @endif

    <section class="w-screen flex justify-center items-center h-screen absolute">


        <div
            class="login-container w-[550px] h-[550px] max-sm:w-[320px] p-8 flex flex-col items-center justify-center rounded-full">
            <div class="flex items-center justify-center w-full p-7 max-sm:pb-6">
                <h1 class="mix-blend-difference text-white font-bold text-5xl w-[500px] text-center max-sm:text-2xl">
                    Admin Page</h1>
            </div>

            <form action="{{ route('admin.auth') }}" class="contents" method="POST">
                @csrf
                <input type="email" name="email" id="email" placeholder="Email" class="bg-gray-200 w-[200px]">
                <input type="password" name="password" id="password" placeholder="Password" class="bg-gray-200 w-[200px]">
                <button class="border-white border-2 rounded-full btn-7 w-[400px] h-[55px]">
                    <span class="text-2xl text-white font-semibold">
                        Submit
                    </span>
                </button>
            </form>
        </div>
    </section>
@endsection
