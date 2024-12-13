@extends('user.layout')

@section('head')
    <style>
        body,
        html {
            overflow-x: hidden;

        }

        .logo {
            filter: drop-shadow(0 0 5px white) drop-shadow(0 0 35px white);
        }

        .footer-section {
            backdrop-filter: brightness(0.9);
        }

        .footer-card {
            box-shadow: 0 0 10px white, 0 0 20px white;
            background: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(18px) !important;
        }
    </style>
@endsection

@section('content')
    <div class="footer-section w-screen h-screen flex justify-center items-center absolute">
        <div class="w-full h-full flex justify-center items-center grid-rows-2 p-20 max-sm:p-6">
            <div
                class="footer-card w-full max-w-[750px] h-[400px] max-sm:h-[500px] flex flex-col justify-center items-center rounded-2xl
             border border-white px-10 max-sm:px-6">
                <h1 class="text-5xl text-white w-full text-center max-[893px]:text-5xl font-semibold
            max-md:text-4xl"
                    data-aos="zoom-out-up">Student Orientation Committee Open Recruitment</h1>
                <div class="flex w-full max-sm:flex-col pt-5 ">
                    <a href="{{ route('auth') }}" class="contents">
                        <button
                            class="button-interact text-2xl font-semibold h-[50px] w-full text-white rounded-3xl mr-2 
                        max-md:text-lg max-sm:mr-0 max-sm:mb-3 max-sm:h-[43px] max-sm:w-full"
                            data-aos="zoom-out" style="background: var(--yellow-grad);">
                            JOIN NOW</button>
                    </a>
                    {{-- <a href="" class="contents">
                        <button
                            class="button-interact text-2xl font-semibold h-[50px] w-1/2 text-white rounded-3xl ml-2 
                        max-md:text-lg max-sm:ml-0 max-sm:h-[43px] max-sm:w-full"
                            data-aos="zoom-out" data-aos-delay="130" style="background: var(--tosca-grad);">
                            OUR DEPARTMENTS</button>
                    </a> --}}
                </div>
                <div class="border-t-[3px] border-white my-5 w-full"> </div>
                <div class="grid grid-cols-2 w-full gap-x-3">
                    <a href="" target="_blank" class="contents">
                        <div class="button-interact rounded-2xl text-white font-semibold mb-5 py-1
                     w-full text-center max-sm:text-sm"
                            data-aos="zoom-in" style="background: var(--line-grad);">
                            <i class="fa-brands fa-line"></i> @OALine
                        </div>
                    </a>
                    <a href="" target="_blank" class="contents">
                        <div class="button-interact rounded-2xl text-white font-semibold mb-5 py-1
                     w-full text-center max-sm:text-sm"
                            data-aos="zoom-in" style="background:var(--ig-grad);">
                            <i class="fa-brands fa-instagram"></i> Instagram
                        </div>
                    </a>
                    <a href="" target="_blank" class="contents">
                        <div class="button-interact rounded-2xl text-white font-semibold mb-5 py-1
                     w-full text-center max-sm:text-sm"
                            data-aos="zoom-in" style="background: var(--yt-grad);">
                            <i class="fa-brands fa-youtube"></i> Youtube
                        </div>
                    </a>
                    <a href="" target="_blank" class="contents">
                        <div class="button-interact rounded-2xl text-white font-semibold mb-5 py-1
                     w-full text-center max-sm:text-sm"
                            data-aos="zoom-in" style="background:var(--tiktok-grad);">
                            <i class="fa-brands fa-tiktok"></i> Tiktok
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
