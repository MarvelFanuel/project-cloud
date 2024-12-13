@extends('user.forms.layout')

@section('head')
    <style>
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.11), rgba(0, 0, 0, 0.11)),
                linear-gradient(45deg, rgba(99, 63, 146, 0.85), rgba(144, 38, 128, 0.85), rgba(246, 206, 62, 0.85));
            background-size: 400% 400%;
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

        .peer {
            border-color: rgba(255, 255, 255 / 1) !important;
            color: var(--tosca-lg) !important;
            font-size: 1.125rem !important;
            font-weight: 500;
        }

        .pointer-events-none {
            --tw-border-opacity: 1 !important;
            border-color: rgb(255 255 255 / var(--tw-border-opacity)) !important;
        }

        .data-\[te-select-open\]\:opacity-100[data-te-select-open] {
            /* background: linear-gradient(-45deg, rgba(41, 42, 103, 0.95), rgba(99, 63, 146, 0.95), rgba(144, 38, 128, 0.95)); */
            background: var(--neutral);
        }

        .data-\[te-select-open\]\:opacity-100[data-te-select-open] div div div span {
            /* color: var(--tosca-lg); */
            color: white;
            font-size: 1.125rem !important;
            font-weight: 500;
        }

        svg {
            color: white;
        }

        .\[\&\:\:-webkit-scrollbar-thumb\]\:bg-\[\#999\]::-webkit-scrollbar-thumb {
            background: var(--tosca-lg) !important;
        }

        .form-cont {
            box-shadow: 0 0 10px var(--tosca-lg), 0 0 20px var(--tosca-lg);

        }

        @media screen and (max-width:640px) {
            .data-\[te-select-open\]\:opacity-100[data-te-select-open] div div div span {
                font-size: 1rem !important;
            }

            .peer {
                font-size: 1rem !important;
            }
        }

        /* Change the color of the date icon */
        input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(100%);
            -ms-filter: invert(100%);
            -webkit-filter: invert(100%);

        }
    </style>
@endsection

@section('content')
    <div
        class="form-cont lg:w-8/12 sm:w-10/12 max-sm:w-11/12 px-5 py-5 my-12 border-0 border-white bg-transparent h-auto rounded-xl">
        <div class="grid sm:grid-cols-2 grid-cols-1 w-full gap-5 place-items-end">
            <div class="relative w-full" data-twe-input-wrapper-init>
                <label for="nrp" class="text-white pl-1 text-lg font-semibold max-lg:!text-base">NRP</label>
                <input type="text"
                    class="peer text-[var(--tosca-lg)] block min-h-[auto] w-full text-lg max-lg:!text-base rounded border-white shadow-lg bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-80 [&:not([data-twe-input-placeholder-active])]:placeholder:text-[var(--tosca-lg)]"
                    placeholder="Default input" value="{{ session('nrp') }}" disabled id="nrp" />
            </div>
            <div class="relative w-full" data-twe-input-wrapper-init>
                <label for="email" class="text-white pl-1 text-lg font-semibold max-lg:!text-base">Email</label>
                <input type="text"
                    class="peer text-[var(--tosca-lg)] block min-h-[auto] w-full text-lg max-lg:!text-base rounded border-white shadow-lg bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-80 [&:not([data-twe-input-placeholder-active])]:placeholder:text-[var(--tosca-lg)]"
                    placeholder="Default input" id="email" value="{{ session('email') }}" disabled />
            </div>
            <div class="relative w-full" data-twe-input-wrapper-init>
                <label for="name" class="text-white pl-1 text-lg font-semibold max-lg:!text-base">Nama Lengkap</label>
                <input type="text"
                    class="peer text-[var(--tosca-lg)] block min-h-[auto] w-full text-lg max-lg:!text-base rounded border-white shadow-lg bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-80 [&:not([data-twe-input-placeholder-active])]:placeholder:text-[var(--tosca-lg)]"
                    placeholder="Default input" value="{{ session('name') }}" id="name" />
            </div>
            <div class="relative w-full" data-twe-input-wrapper-init>
                <label for="major" class="text-white pl-1 text-lg font-semibold max-lg:!text-base">Program/Program
                    Studi</label>
                <input type="text"
                    class="peer text-[var(--tosca-lg)] block min-h-[auto] w-full text-lg max-lg:!text-base rounded border-white shadow-lg bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-80 [&:not([data-twe-input-placeholder-active])]:placeholder:text-[var(--tosca-lg)]"
                    placeholder="Ex: Business Information System" id="major" />
            </div>
            <div class="w-full shadow-lg">
                <label for="gender" class="text-white pl-1 text-lg font-semibold max-lg:!text-base">Jenis Kelamin</label>
                <select id="gender" data-te-select-init>
                    <option value="x">-- -- Select One -- --</option>
                    <option value="male">Laki - laki</option>
                    <option value="female">Perempuan</option>
                </select>
            </div>
            <div class="w-full shadow-lg">
                <label for="religion" class="text-white pl-1 text-lg font-semibold max-lg:!text-base">Agama</label>
                <select id="religion" data-te-select-init>
                    <option value="x">-- -- Select One -- --</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Islam">Islam</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Konghucu">Konghucu</option>
                    <option value="Kristen">Kristen</option>
                </select>
            </div>
            <div class="relative w-full" data-twe-input-wrapper-init>
                <label for="birthPlace" class="text-white pl-1 text-lg font-semibold max-lg:!text-base">Tempat Lahir</label>
                <input type="text"
                    class="peer text-[var(--tosca-lg)] block min-h-[auto] w-full text-lg max-lg:!text-base rounded border-white shadow-lg bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-80 [&:not([data-twe-input-placeholder-active])]:placeholder:text-[var(--tosca-lg)]"
                    placeholder="Ex: Surabaya" id="birthPlace" />
            </div>
            <div class="w-full">
                <label for="birthDate" class="text-white pl-1 text-lg font-semibold max-lg:!text-base">Tanggal Lahir</label>
                <input type="date" id="birthDate" placeholder="mm/dd/yyyy"
                    class="text-lg text-[var(--tosca-lg)] font-medium max-lg:text-base border border-white w-full bg-transparent rounded-sm h-[40.83px]">
            </div>
            <div class="relative w-full" data-twe-input-wrapper-init>
                <label for="gpa" class="text-white pl-1 text-lg font-semibold max-lg:!text-base">IPK Terakhir</label>
                <input type="text"
                    class="peer text-[var(--tosca-lg)] block min-h-[auto] w-full text-lg max-lg:!text-base rounded border-white shadow-lg bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-80 [&:not([data-twe-input-placeholder-active])]:placeholder:text-[var(--tosca-lg)]"
                    placeholder="Ex: 3.92" id="gpa" />
            </div>
            <div class="relative w-full" data-twe-input-wrapper-init>
                <label for="phone" class="text-white pl-1 text-lg font-semibold max-lg:!text-base">Nomor Telepon</label>
                <input type="text"
                    class="peer text-[var(--tosca-lg)] block min-h-[auto] w-full text-lg max-lg:!text-base rounded border-white shadow-lg bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-80 [&:not([data-twe-input-placeholder-active])]:placeholder:text-[var(--tosca-lg)]"
                    placeholder="Ex: 081234567891" id="phone" />
            </div>
            <div class="relative w-full" data-twe-input-wrapper-init>
                <label for="line_id" class="text-white pl-1 text-lg font-semibold max-lg:!text-base">ID Line</label>
                <input type="text"
                    class="peer text-[var(--tosca-lg)] block min-h-[auto] w-full text-lg max-lg:!text-base rounded border-white shadow-lg bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-80 [&:not([data-twe-input-placeholder-active])]:placeholder:text-[var(--tosca-lg)]"
                    placeholder="ID Line" id="lineId" />
            </div>
            <div class="relative w-full" data-twe-input-wrapper-init>
                <label for="instagram" class="text-white pl-1 text-lg font-semibold max-lg:!text-base">Instagram</label>
                <input type="text"
                    class="peer text-[var(--tosca-lg)] block min-h-[auto] w-full text-lg max-lg:!text-base rounded border-white shadow-lg bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-80 [&:not([data-twe-input-placeholder-active])]:placeholder:text-[var(--tosca-lg)]"
                    placeholder="Username IG" id="instagram" />
            </div>
            <div class="relative w-full col-span-2 max-sm:col-span-1" data-twe-input-wrapper-init>
                <label for="address" class="text-white pl-1 text-lg font-semibold max-lg:!text-base">Alamat
                    Domisili</label>
                <textarea
                    class="shadow-lg peer block min-h-[auto] w-full rounded border border-white bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-80 [&:not([data-twe-input-placeholder-active])]:placeholder:text-[var(--tosca-lg)]"
                    id="address" rows="2" placeholder="Alamat Domisili"></textarea>
            </div>
            <div class="relative w-full col-span-2 max-sm:col-span-1" data-twe-input-wrapper-init>
                <label for="strength" class="text-white pl-1 text-lg font-semibold max-lg:!text-base">Kelebihan</label>
                <textarea
                    class="shadow-lg peer block min-h-[auto] w-full rounded border border-white bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-80 [&:not([data-twe-input-placeholder-active])]:placeholder:text-[var(--tosca-lg)]"
                    id="strength" rows="2" placeholder="Kelebihan"></textarea>
            </div>
            <div class="relative w-full col-span-2 max-sm:col-span-1" data-twe-input-wrapper-init>
                <label for="weakness" class="text-white pl-1 text-lg font-semibold max-lg:!text-base">Kekurangan</label>
                <textarea
                    class="shadow-lg peer block min-h-[auto] w-full rounded border border-white bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-80 [&:not([data-twe-input-placeholder-active])]:placeholder:text-[var(--tosca-lg)]"
                    id="weakness" rows="2" placeholder="Kekurangan"></textarea>
            </div>
            <div class="relative w-full col-span-2 max-sm:col-span-1" data-twe-input-wrapper-init>
                <label for="committee" class="text-white pl-1 text-lg font-semibold max-lg:!text-base">Pengalaman
                    Kepanitiaan</label>
                <textarea
                    class="shadow-lg peer block min-h-[auto] w-full rounded border border-white bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-80 [&:not([data-twe-input-placeholder-active])]:placeholder:text-[var(--tosca-lg)]"
                    id="committee" rows="2" placeholder="Ex: Anggota divisi perlengkapan"></textarea>
            </div>
            <div class="relative w-full col-span-2 max-sm:col-span-1" data-twe-input-wrapper-init>
                <label for="organization" class="text-white pl-1 text-lg font-semibold max-lg:!text-base">Pengalaman
                    Organisasi</label>
                <textarea
                    class="shadow-lg peer block min-h-[auto] w-full rounded border border-white bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-80 [&:not([data-twe-input-placeholder-active])]:placeholder:text-[var(--tosca-lg)]"
                    id="organization" rows="2" placeholder="Ex: Internship departemen Media Information"></textarea>
            </div>
            <div class="relative w-full col-span-2 max-sm:col-span-1" data-twe-input-wrapper-init>
                <label for="motivation" class="text-white pl-1 text-lg font-semibold max-lg:!text-base">Motivasi</label>
                <textarea
                    class="shadow-lg peer block min-h-[auto] w-full rounded border border-white bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-80 [&:not([data-twe-input-placeholder-active])]:placeholder:text-[var(--tosca-lg)]"
                    id="motivation" rows="2" placeholder="Motivasi mendaftar sebagai fungsionaris"></textarea>
            </div>
            <div class="relative w-full col-span-2 max-sm:col-span-1" data-twe-input-wrapper-init>
                <label for="portfolio" class="text-white pl-1 text-lg font-semibold max-lg:!text-base">Link Portfolio
                    (Wajib untuk CMD)</label>
                <textarea
                    class="shadow-lg peer block min-h-[auto] w-full rounded border border-white bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-80 [&:not([data-twe-input-placeholder-active])]:placeholder:text-[var(--tosca-lg)]"
                    id="portfolio" rows="2" placeholder="Ex: link drive, youtube, github, dll"></textarea>
            </div>
            <div class="w-full shadow-lg">
                <label for="choice1" class="text-white pl-1 text-lg font-semibold max-lg:!text-base">Pilihan Divisi
                    1</label>
                <select id="choice1" data-te-select-init>
                    <option value="x">-- -- Select One -- --</option>
                    @foreach ($divisions as $division)
                        <option value="{{ $division->id }}">{{ $division->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-full shadow-lg">
                <label for="choice2" class="text-white pl-1 text-lg font-semibold max-lg:!text-base">Pilihan Divisi
                    2</label>
                <select id="choice2" data-te-select-init>
                    <option value="x">-- -- Select One -- --</option>
                    @foreach ($divisions as $division)
                        <option value="{{ $division->id }}">{{ $division->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-full col-span-2 max-sm:col-span-1 mt-3">
                <button
                    class="button-interact h-[50px] w-full rounded-lg border-2 border-white text-center text-xl text-[var(--tosca-lg)] 
                font-semibold italic shadow-lg"
                    id="submit">Submit</button>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("submit").addEventListener("click", function(e) {
                e.preventDefault();

                const choice1 = document.getElementById("choice1").value;
                const choice2 = document.getElementById("choice2").value;
                const birthDate = document.getElementById("birthDate").value;

                if (choice1 === choice2) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'division choice 1 and 2 must be different!'
                    });
                } else if (birthDate === '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Birth date must be filled!'
                    });
                } else {
                    Swal.fire({
                            title: 'Are you sure?',
                            text: 'Data yang telah disubmit tidak bisa diubah kembali.',
                            confirmButtonText: 'Yes',
                            showDenyButton: true,
                            denyButtonText: 'No',
                            icon: 'warning'
                        })
                        .then((result) => {
                            if (result.isConfirmed) {
                                const data = {
                                    nrp: "{{ session('nrp') }}",
                                    name: document.getElementById("name").value,
                                    major: document.getElementById("major").value,
                                    gender: document.getElementById("gender").value,
                                    religion: document.getElementById("religion").value,
                                    birth_place: document.getElementById("birthPlace").value,
                                    birth_date: birthDate,
                                    address: document.getElementById("address").value,
                                    phone: document.getElementById("phone").value,
                                    gpa: document.getElementById("gpa").value,
                                    line_id: document.getElementById("lineId").value,
                                    instagram: document.getElementById("instagram").value,
                                    strength: document.getElementById("strength").value,
                                    weakness: document.getElementById("weakness").value,
                                    organization_experience: document.getElementById("organization")
                                        .value,
                                    committee_experience: document.getElementById("committee")
                                        .value,
                                    portfolio: document.getElementById("portfolio").value,
                                    motivation: document.getElementById("motivation").value,
                                    choice_1: choice1,
                                    choice_2: choice2,
                                    _token: "{{ csrf_token() }}",
                                    email: "{{ session('email') }}",
                                };

                                fetch("{{ route('biodata.submit') }}", {
                                        method: "POST",
                                        headers: {
                                            "Content-Type": "application/json",
                                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                        },
                                        body: JSON.stringify(data)
                                    })
                                    .then(response => response.json())
                                    .then(res => {
                                        if (res.success) {
                                            Swal.fire({
                                                title: 'Success',
                                                text: 'Biodata successfully submitted!',
                                                icon: 'success'
                                            }).then(() => {
                                                window.location.href =
                                                    "{{ route('files') }}";
                                            });
                                        } else {
                                            Swal.fire({
                                                title: 'Error!',
                                                text: res.message,
                                                icon: 'error'
                                            });
                                        }
                                    })
                                    .catch(err => {
                                        Swal.fire({
                                            title: 'Oops...',
                                            text: 'Something went wrong :(',
                                            icon: 'error'
                                        });
                                    });
                            }
                        });
                }
            });
        });
    </script>
@endsection
