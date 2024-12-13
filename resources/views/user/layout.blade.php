<!DOCTYPE html>
<html lang="en">

<head>
    <title> {{ $title }}</title>
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
    {{-- AOS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

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
            --yellow-grad: linear-gradient(45deg, var(--yellow) 0%, var(--magenta) 100%);
            --tosca-grad: linear-gradient(45deg, var(--tosca) 0%, var(--purple) 100%);
            --ig-grad: linear-gradient(45deg, #ffde85 0%, #f7792a 30%, #f7504f 40%, #d82b81 60%, #d82b81 75%, #9536c2 100%);
            --line-grad: linear-gradient(45deg, #1a6c2a, #4cc764);
            --yt-grad: linear-gradient(45deg, #f76161, #dc2626);
            --spotify-grad: linear-gradient(45deg, #1DB954, #191414);
            --tiktok-grad: linear-gradient(45deg, #ff0050, #191414 40%, #191414 60%, #00f2ea);
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
            background-color: #b57cca;
            background-image:
                radial-gradient(at 0% 0%, hsla(265, 57%, 42%, 1) 0px, transparent 50%),
                radial-gradient(at 80% 2%, #c31eac 0px, transparent 50%),
                radial-gradient(at 0% 57%, hsla(343, 99%, 46%, 1) 0px, transparent 50%),
                radial-gradient(at 85% 58%, #fbc31a 0px, transparent 50%),
                radial-gradient(at 41% 28%, hsla(265, 57%, 42%, 1) 0px, transparent 50%),
                radial-gradient(at 80% 83%, hsl(343, 99%, 46%) 0px, transparent 50%),
                radial-gradient(at 10% 80%, #fdd247 0px, transparent 50%);
        }

        .disableScroll {
            overflow-y: hidden !important;
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

        .button-animate {
            position: relative;
            transition: all .7s;
            overflow: hidden;
        }

        .button-animate0::before {
            content: "";
            position: absolute;
            left: -50px;
            top: 0;
            width: 0;
            height: 100%;
            background: var(--yellow);
            transform: skewX(45deg);
            z-index: -1;
            transition: width 0.77s, box-shadow 4s !important;
        }

        .button-animate1::before {
            content: "";
            position: absolute;
            left: -50px;
            top: 0;
            width: 0;
            height: 100%;
            background: linear-gradient(45deg, var(--tosca) 0%, var(--purple) 100%);
            transform: skewX(45deg);
            z-index: -1;
            transition: width 0.77s, box-shadow 4s !important;
        }

        .button-animate2::before {
            content: "";
            position: absolute;
            left: -50px;
            top: 0;
            width: 0;
            height: 100%;
            background: linear-gradient(45deg, var(--yellow) 0%, var(--magenta) 100%);
            transform: skewX(45deg);
            z-index: -1;
            transition: width 0.77s, box-shadow 4s !important;
        }

        .button-animate:hover::before {
            width: 155%;
        }

        .button-animate:active {
            box-shadow: none !important;
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
    @if (session()->has('error'))
        <script>
            Swal.fire({
                title: "Error",
                icon: "error",
                text: "{{ session('error') }}",
            })
        </script>
    @endif
    @yield('content')

</body>

{{-- AOS --}}
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

{{-- TW Element --}}
<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>

{{-- Swiper --}}
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

{{-- GSAP --}}
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>

<script>
    AOS.init();
</script>

</html>
