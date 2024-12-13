@extends('user.forms.layout')

@section('head')
    <style>
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)),
                linear-gradient(45deg, rgba(230, 45, 99, 0.8), rgba(246, 206, 62, 0.8), rgba(76, 183, 156, 0.8));

            background-size: 400% 400%;
        }

        .peer {
            border-color: rgba(255, 255, 255 / 1) !important;
            color: var(--purple-dark) !important;
            font-size: 1.125rem !important;
            font-weight: 500;
        }

        .pointer-events-none {
            --tw-border-opacity: 1 !important;
            border-color: rgb(255 255 255 / var(--tw-border-opacity)) !important;
        }

        .data-\[te-select-open\]\:opacity-100[data-te-select-open] {
            /* background: linear-gradient(-45deg, rgba(41, 42, 103, 0.95), rgba(99, 63, 146, 0.95), rgba(144, 38, 128, 0.95)); */
            background: var(--purple-dark);
        }

        .data-\[te-select-open\]\:opacity-100[data-te-select-open] div div div span {
            color: white;
            font-size: 1.125rem !important;
            font-weight: 500;
        }

        svg {
            color: white;
        }

        .\[\&\:\:-webkit-scrollbar-thumb\]\:bg-\[\#999\]::-webkit-scrollbar-thumb {
            background: #f6ce3e !important;
        }

        .form-cont {
            box-shadow: 0 0 10px var(--purple-dark), 0 0 20px var(--purple-dark);
        }

        @media screen and (max-width:640px) {
            .data-\[te-select-open\]\:opacity-100[data-te-select-open] div div div span {
                font-size: 1rem !important;
            }

            .peer {
                font-size: 1rem !important;
            }
        }
    </style>
@endsection

@section('content')
    <form class="contents">
        <div
            class="form-cont lg:w-8/12 md:w-10/12 max-md:w-11/12 px-5 py-5 my-12 border-0 border-white bg-transparent h-auto rounded-xl">
            <h2 class="text-white text-3xl max-sm:text-2xl font-semibold italic">Ketentuan:</h2>
            <ul class="list-disc list-inside mb-5">
                <li class="text-white font-medium text-lg max-sm:text-base">SEMUA interview dilakukan secara ONSITE</li>
                <li class="text-white font-medium text-lg max-sm:text-base">Peserta dapat mengganti jadwal maksimal pukul
                    20.00, sehari sebelum hari - h interview</li>
                <li class="text-white font-medium text-lg max-sm:text-base">Peserta DILARANG mengganti/mengambil jadwal interview orang lain</li>
                </li>
                <li class="text-white font-medium text-lg max-sm:text-base">Peserta WAJIB menggunakan baju berkerah</li>
                <li class="text-white font-medium text-lg max-sm:text-base">Link jadwal interview: <a
                        class="underline text-teal-300"
                        href="https://workspace.google.com/intl/en_id/products/sheets/">https://workspace.google.com/intl/en_id/products/sheets/</a>
                </li>
            </ul>
            <button type="button" onclick="checkInterview()"
                class="button-interact h-[50px] w-full rounded-lg border-2 border-white text-center text-xl text-[var(--yellow)] 
    font-semibold italic shadow-lg">Next</button>
        </div>
    </form>

    <script>
        function checkInterview() {
            fetch(`{{ route('checkInterview') }}`, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                    }
                }).then(response => response.json())
                .then(response => {
                    if (response.success) {
                        window.location.href = "{{ route('project') }}";
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message,
                        })
                    }
                }).catch((error) => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong',
                    })
                });
        }
    </script>
@endsection
