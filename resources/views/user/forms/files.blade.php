@extends('user.forms.layout')

@section('head')
    <style>
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0.15)),
                linear-gradient(-45deg, rgba(99, 63, 146, 0.8), rgba(144, 38, 128, 0.8), rgba(196, 37, 85, 0.8));
            background-size: 400% 400%;
        }

        .peer {
            border-color: rgba(255, 255, 255 / 1) !important;
            color: var(--yellow) !important;
            font-size: 1.125rem !important;
            font-weight: 500;
        }

        .pointer-events-none {
            --tw-border-opacity: 1 !important;
            border-color: rgb(255 255 255 / var(--tw-border-opacity)) !important;
        }

        .data-\[te-select-open\]\:opacity-100[data-te-select-open] {
            background: var(--neutral);
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
            box-shadow: 0 0 10px var(--yellow), 0 0 20px var(--yellow);
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
    <form class="contents" enctype="multipart/form-data" id="files-form">
        <div class="form-cont lg:w-8/12 md:w-10/12 max-md:w-11/12 px-5 py-5 my-12 border-0 border-white bg-transparent h-auto rounded-xl">
            <h2 class="text-white text-3xl max-sm:text-2xl font-semibold italic">Ketentuan:</h2>
            <ul class="list-disc list-outside mb-5 ml-5">
                <li class="text-white font-medium text-lg max-sm:text-base">File harus berupa .jpg/.png/.jpeg</li>
                <li class="text-white font-medium text-lg max-sm:text-base">Ukuran upload maksimal 5MB / file</li>
                <li class="text-white font-medium text-lg max-sm:text-base">Data file tidak bisa diubah setelah form tersubmit</li>
            </ul>
            <div class="grid grid-cols-2 max-xl:grid-cols-1 w-full gap-5 place-items-end">

                <div class="flex gap-x-4 items-end w-full">
                    <div class="w-full">
                        <label for="ktm" class="text-white mb-1 text-lg font-semibold max-lg:!text-base">Scan KTM / Profile Petra Mobile</label>
                        <input type="file" class="form-control" id="ktm" name="ktm" accept="image/*" />
                    </div>
                    <button type="button" class="bg-yellow-600 text-white h-[39.93px] max-xl:h-[35.83px] max-lg:text-xs w-fit px-8 rounded text-sm font-medium tracking-wider" onclick="upload('ktm')">UPLOAD</button>
                </div>

                <div class="flex gap-x-4 items-end w-full">
                    <div class="w-full">
                        <label for="grade" class="text-white mb-1 text-lg font-semibold max-lg:!text-base">Transkrip KHS</label>
                        <input type="file" class="form-control" id="grade" name="grade" accept="image/*" />
                    </div>
                    <button type="button" class="bg-yellow-600 text-white h-[39.93px] max-xl:h-[35.83px] max-lg:text-xs w-fit px-8 rounded text-sm font-medium tracking-wider" onclick="upload('grade')">UPLOAD</button>
                </div>

                <div class="flex gap-x-4 items-end w-full">
                    <div class="w-full">
                        <label for="skkk" class="text-white mb-1 text-lg font-semibold max-lg:!text-base">Transkrip SKKK</label>
                        <input type="file" class="form-control" id="skkk" name="skkk" accept="image/*" />
                    </div>
                    <button type="button" class="bg-yellow-600 text-white h-[39.93px] max-xl:h-[35.83px] max-lg:text-xs w-fit px-8 rounded text-sm font-medium tracking-wider" onclick="upload('skkk')">UPLOAD</button>
                </div>

                <div class="flex gap-x-4 items-end w-full">
                    <div class="w-full">
                        <label for="cheats" class="text-white mb-1 text-lg font-semibold max-lg:!text-base">Bukti Kecurangan</label>
                        <input type="file" class="form-control" id="cheats" name="cheats" accept="image/*" />
                    </div>
                    <button type="button" class="bg-yellow-600 text-white h-[39.93px] max-xl:h-[35.83px] max-lg:text-xs w-fit px-8 rounded text-sm font-medium tracking-wider" onclick="upload('cheats')">UPLOAD</button>
                </div>

                <div class="flex gap-x-4 items-end w-full">
                    <div class="w-full">
                        <label for="photo" class="text-white mb-1 text-lg font-semibold max-lg:!text-base">Pas Foto 3x4</label>
                        <input type="file" class="form-control" id="photo" name="photo" accept="image/*" />
                    </div>
                    <button type="button" class="bg-yellow-600 text-white h-[39.93px] max-xl:h-[35.83px] max-lg:text-xs w-fit px-8 rounded text-sm font-medium tracking-wider" onclick="upload('photo')">UPLOAD</button>
                </div>

                <div class="w-full col-span-2 max-xl:col-span-1 mt-3">
                    <button type="button" id="next-button" class="button-interact h-[50px] w-full rounded-lg border-2 border-white text-center text-xl text-[var(--yellow)] font-semibold italic shadow-lg" onclick="next()" disabled>Next</button>
                </div>
            </div>

        </div>
    </form>
@endsection

@section('script')
    <script>
        const uploadedFiles = {
            ktm: false,
            grade: false,
            skkk: false,
            cheats: false,
            photo: false,
        };

        function upload(slug) {
            Swal.fire({
                title: 'Uploading...',
                allowOutsideClick: false,
                showConfirmButton: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            const file = document.getElementById(slug).files[0];
            const formData = new FormData();
            formData.append(slug, file);
            formData.append('_token', '{{ csrf_token() }}'); // Ensure CSRF token is passed

            fetch(`{{ url('/upload') }}/${slug}`, {
                method: 'POST',
                body: formData
            }).then(res => res.json())
                .then(data => {
                    if (data.success) {
                        document.querySelector(`button[onclick="upload('${slug}')"]`).classList.remove('bg-yellow-600');
                        document.querySelector(`button[onclick="upload('${slug}')"]`).classList.add('bg-success');
                        document.querySelector(`button[onclick="upload('${slug}')"]`).textContent = 'UPLOADED';
                        document.querySelector(`button[onclick="upload('${slug}')"]`).setAttribute('disabled', '');

                        // Mark the file as uploaded
                        uploadedFiles[slug] = true;
                        checkAllUploaded();

                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: data.message
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: data.message
                        });
                    }
                }).catch(err => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Something went wrong'
                    });
                });
        }

        function checkAllUploaded() {
            const allUploaded = Object.values(uploadedFiles).every(status => status);
            const nextButton = document.getElementById('next-button');
            nextButton.disabled = !allUploaded;
        }

        function next() {
            Swal.fire({
                title: 'Loading...',
                allowOutsideClick: false,
                showConfirmButton: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            fetch(`{{ route('files.check') }}`, {
                method: 'GET',
            }).then(res => res.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: data.message
                        }).then(() => {
                            window.location.href = '{{ route('schedule') }}';
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: data.message,
                            didOpen: () => {
                                Swal.hideLoading();
                            }
                        });
                    }
                }).catch(err => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Something went wrong',
                        didOpen: () => {
                            Swal.hideLoading();
                        }
                    });
                });
        }
    </script>
@endsection
