<!doctype html>
<html lang="en">

<head>
    <title>User | {{ $title }}</title>
    <link rel="icon" href="{{ asset('assets/logo2425.png') }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- CDN for tailwind --}}
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    {{-- CDN for JQUERY --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    {{-- CDN for Tailwind Element --}}
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
    {{-- AOS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    {{-- FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    {{-- Swiper --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    {{-- TW CSS --}}
    <script src="https://cdn.tailwindcss.com/3.3.0"></script>
    {{-- CDN for SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap');


        * {
            font-family: 'Jost', sans-serif;
            --neutral: #292A67;
            --yellow: #F6CE3E;
            --red: #E62D63;
            --red-lg: #ff6e9a;
            --magenta: #902680;
            --purple: #633F92;
            --purple-dark: #5500a4;
            --tosca: #4CB79C;
            --tosca-lg: rgb(74, 231, 192);
        }

        ::-webkit-scrollbar {
            width: 9.5px;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--tosca);
            border-radius: 30px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(76, 183, 156, 0.4);
        }

        ::selection {
            color: white;
            background: #4CB79C;
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        body {
            min-height: 100vh;
            min-width: 100vw;
            margin: 0;
            top: 0;
            left: 0;
            overflow-x: hidden;
            animation: gradient 15s linear infinite;
            /* background: linear-gradient(-45deg, rgba(41, 42, 103, 0.9) 0%, rgba(99, 63, 146, 0.9) 21%, rgba(144, 38, 128, 0.9) 40%, rgba(230, 45, 99, 0.9) 60%, rgba(246, 206, 62, 0.9) 80%, rgba(76, 183, 156, 0.9) 100%); */
        }

        .swal2-confirm {
            background: rgb(46, 143, 255) !important;
        }

        .swal2-deny,
        .swal2-cancel {
            background: rgb(255, 79, 79) !important;
        }

        .button-interact {
            transition: .3s ease;
        }

        .button-interact:hover {
            box-shadow: 0 0 9px white;
        }

        .button-interact:active {
            box-shadow: none;
        }

        .text-glow {
            text-shadow: 0 0 2px rgba(255, 255, 255, 0.8);
        }

        input:disabled {
            background: rgba(255, 255, 255, 0.14);
        }
    </style>
    @yield('head')


</head>

<body>
    @if (session()->has('phaseCheck'))
        <script>
            Swal.fire({
                title: "Error",
                icon: "error",
                text: "{{ session('phaseCheck') }}",
            })
        </script>
    @endif
    @if (session()->has('success'))
        <script>
            Swal.fire({
                title: "Success",
                icon: "success",
                text: "{{ session('success') }}",
            })
        </script>
    @endif
    @if (session()->has('error'))
        <script>
            Swal.fire({
                title: "Error",
                icon: "error",
                text: "{{ session('error') }}",
            })
        </script>
    @endif


    <div class="navigation py-6 px-12 w-full h-auto flex items-center max-md:justify-between max-sm:px-6">
        <div class="flex flex-col w-fit">
            <a href="{{ route('logout') }}" class="contents">
                <button
                    class="button-interact ease duration-300 px-6 text-[var(--neutral)] bg-white w-full h-[36px] rounded-3xl
                     font-semibold tracking-wide mt-3 z-10">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Logout</button>
            </a>
            <a href="{{ route('index') }}" class="contents">
                <button
                    class="button-interact ease duration-300 px-6 text-[var(--neutral)] bg-white w-full h-[36px] rounded-3xl
                     font-semibold tracking-wide mt-3 z-10">
                    <i class="fa-solid fa-circle-chevron-left"></i>
                    Back</button>
            </a>
        </div>
        <h1
            class="text-5xl max-md:relative max-md:text-right max-md:w-3/5 font-bold italic text-white w-full
         text-center absolute left-0 max-md:self-end max-[375px]:text-4xl">
            Form {{ $title }}
        </h1>
    </div>
    <div class="main w-full flex flex-col items-center">
        <ul
            class="w-5/6 max-sm:w-[93%] relative pb-3 flex list-none justify-between overflow-hidden transition-[height] duration-200 ease-in-out">

            <!--First item-->
            <li data-te-stepper-step-ref="" data-te-stepper-step-active="" class="w-[4.5rem] flex-auto">
                <a href="{{ route('biodata') }}">
                    <div data-te-stepper-head-ref=""
                        class="flex cursor-pointer items-center pl-2 leading-[0.5rem] no-underline after:ml-2 after:h-px after:w-full after:flex-1 after:content-[''] focus:outline-none after:bg-white">
                        <div class="flex flex-col items-center">
                            <span data-te-stepper-head-icon-ref=""
                                class="my-3 flex h-[1.938rem] w-[1.938rem] items-center justify-center rounded-full text-sm font-medium !bg-[var(--neutral)] text-white">
                                @if (session()->has('phase') && session('phase') >= 1)
                                    <i class="fa-solid fa-check text-green-300"></i>
                                @else
                                    1
                                @endif
                            </span>
                            <span data-te-stepper-head-text-ref=""
                                class="text-glow after:flex after:text-[0.8rem] after:content-[data-content] font-semibold !text-white">
                                Biodata
                            </span>
                        </div>
                    </div>
                </a>
            </li>

            <!--Second item-->
            <li data-te-stepper-step-ref="" class="w-[4.5rem] flex-auto">

                <a href="{{ route('files') }}">
                    <div data-te-stepper-head-ref=""
                        class="flex cursor-pointer items-center leading-[0.5rem] no-underline before:mr-2 before:h-px before:w-full before:flex-1 before:content-[''] after:ml-2 after:h-px after:w-full after:flex-1 after:content-[''] focus:outline-none before:bg-white after:bg-white">
                        <div class="flex flex-col items-center">
                            <span data-te-stepper-head-icon-ref=""
                                class="my-3 flex h-[1.938rem] w-[1.938rem] items-center justify-center rounded-full text-sm font-medium !bg-[var(--neutral)] !text-[white]">
                                @if (session()->has('phase') && session('phase') >= 2)
                                    <i class="fa-solid fa-check text-green-300"></i>
                                @else
                                    2
                                @endif
                            </span>
                            <span data-te-stepper-head-text-ref=""
                                class="text-glow after:flex after:text-[0.8rem] after:content-[data-content] font-semibold !text-white">
                                Berkas
                            </span>
                        </div>
                    </div>
                </a>
            </li>

            <!--Third item-->
            <li data-te-stepper-step-ref="" class="w-[4.5rem] flex-auto">

                <a href="{{ route('schedule') }}">
                    <div data-te-stepper-head-ref=""
                        class="flex cursor-pointer items-center leading-[0.5rem] no-underline before:mr-2 before:h-px before:w-full before:flex-1 before:content-[''] after:ml-2 after:h-px after:w-full after:flex-1 after:content-[''] focus:outline-none before:bg-white after:bg-white">
                        <div class="flex flex-col items-center">
                            <span data-te-stepper-head-icon-ref=""
                                class="my-3 flex h-[1.938rem] w-[1.938rem] items-center justify-center rounded-full text-sm font-medium
                        !bg-[var(--neutral)] !text-[white]">
                                @if (session()->has('phase') && session('phase') >= 3)
                                    <i class="fa-solid fa-check text-green-300"></i>
                                @else
                                    3
                                @endif
                            </span>
                            <span data-te-stepper-head-text-ref=""
                                class="text-glow after:flex after:text-[0.8rem] after:content-[data-content] font-semibold !text-white">
                                Interview
                            </span>
                        </div>
                    </div>
                </a>
            </li>

            <!--Fourth item-->
            <li data-te-stepper-step-ref="" class="w-[4.5rem] flex-auto">
                <a href="{{ route('project') }}">
                    <div data-te-stepper-head-ref=""
                        class="flex cursor-pointer items-center pr-2 leading-[0.5rem] no-underline before:mr-2 before:h-px before:w-full before:flex-1 before:content-[''] focus:outline-none before:bg-white">
                        <div class="flex flex-col items-center">
                            <span data-te-stepper-head-icon-ref=""
                                class="my-3 flex h-[1.938rem] w-[1.938rem] items-center justify-center rounded-full text-sm font-medium !bg-[var(--neutral)] !text-[white]">
                                @if (session()->has('phase') && session('phase') > 4)
                                    <i class="fa-solid fa-check text-green-300"></i>
                                @else
                                    4
                                @endif
                            </span>
                            <span data-te-stepper-head-text-ref=""
                                class="text-glow after:flex after:text-[0.8rem] after:content-[data-content] font-semibold !text-white">
                                Project
                            </span>
                        </div>
                    </div>
                </a>
            </li>
        </ul>


        @yield('content')
    </div>


</body>


{{-- TW Element --}}
<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>

{{-- Swiper --}}
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

{{-- GSAP --}}
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
@yield('script')

</html>
