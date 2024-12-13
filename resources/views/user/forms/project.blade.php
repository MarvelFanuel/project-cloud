@extends('user.forms.layout')

@section('head')
    <style>
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)),
                linear-gradient(45deg, rgba(76, 183, 156, 0.8), rgba(99, 63, 146, 0.85), rgba(144, 38, 128, 0.85));
            /* rgba(41, 42, 103, 0.9) */
            background-size: 300% 300%;
        }

        .peer {
            border-color: rgba(255, 255, 255 / 1) !important;
            color: var(--red-lg) !important;
            font-size: 1.125rem !important;
            font-weight: 500;
        }

        .pointer-events-none {
            --tw-border-opacity: 1 !important;
            border-color: rgb(255 255 255 / var(--tw-border-opacity)) !important;
        }

        .data-\[te-select-open\]\:opacity-100[data-te-select-open] {
            /* background: linear-gradient(-45deg, rgba(41, 42, 103, 0.95), rgba(99, 63, 146, 0.95), rgba(144, 38, 128, 0.95)); */
            background: var(--red-lg);
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
            box-shadow: 0 0 10px var(--red-lg), 0 0 20px var(--red-lg);
        }

        @media screen and (max-width:640px) {
            .data-\[te-select-open\]\:opacity-100[data-te-select-open] div div div span {
                font-size: 1rem !important;
            }

            .peer {
                font-size: 1rem !important;
            }
        }

        .penjelasan a {
            display: contents !important;
            width: fit-content !important;
        }
    </style>
@endsection

@section('content')
    @if (session()->has('error'))
        <script>
            Swal.fire({
                title: "Error",
                icon: "error",
                text: "{{ session('error') }}",
            })
        </script>
    @endif
    @if (session()->has('success'))
        <script>
            Swal.fire({
                title: "Success!",
                icon: "success",
                text: "{{ session('success') }}",
            })
        </script>
    @endif

    <div
        class="form-cont lg:w-8/12 md:w-10/12 max-md:w-11/12 px-5 py-5 my-12 border-0 border-white bg-transparent h-auto rounded-xl">
        <div class="grid grid-cols-1 w-full gap-5 place-items-end">
            <div class="w-full shadow-lg">
                <label for="department" class="text-white pl-1 text-lg font-semibold max-lg:!text-base">Departemen</label>
                <select id="department" name="department_id" data-te-select-init>
                    <option value="x">-- -- Select One -- --</option>
                    <option value="{{ $applicant['choice1']['id'] }}">{{ $applicant['choice1']['name'] }}</option>
                    <option value="{{ $applicant['choice2']['id'] }}">{{ $applicant['choice2']['name'] }}</option>
                </select>
            </div>
            <div class="w-full penjelasan-container">
                <a class="penjelasan w-full font-semibold pl-1 underline text-teal-300" href=""></a>
            </div>
            <div class="relative w-full" data-twe-input-wrapper-init>
                <label for="address" class="text-white pl-1 text-lg font-semibold max-lg:!text-base">Link Pengumpulan
                    Project</label>
                <input type="text"
                    class="peer text-[var(--red-lg)] block min-h-[auto] w-full text-lg max-lg:!text-base rounded border-white shadow-lg bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-80 [&:not([data-twe-input-placeholder-active])]:placeholder:text-[var(--red-lg)]"
                    placeholder="Pastikan link bisa diakses" id="address" name="project_link" />
                <input type="hidden" id="pilihan">
            </div>
            <div class="w-full mt-3">
                <button
                    class="button-interact h-[50px] w-full rounded-lg border-2 border-white text-center text-xl text-[var(--red-lg)] 
                font-semibold italic"
                    onclick="submitProject()" id="submit">Submit</button>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            var candidate = @json($applicant);
            $('#department').on('change', function() {
                var choice_id = $('#department').find(':selected').val();
                $('.penjelasan').empty();
                $('#address').val('');
                if (choice_id == candidate['choice1']['id'] && candidate['choice1']['project_link']) {
                    $('.penjelasan').html(candidate['choice1']['project_link']);
                    $('.penjelasan').attr('href', candidate['choice1']['project_link']);
                    $('#pilihan').val('choice1');
                    if (candidate['project_link_1']) {
                        $('#address').val(candidate['project_link_1']);
                        $('#address').prop('disabled', true);

                    }
                } else if (choice_id == candidate['choice2']['id'] && candidate['choice2'][
                        'project_link'
                    ]) {
                    $('.penjelasan').html(candidate['choice2']['project_link']);
                    $('.penjelasan').attr('href', candidate['choice2']['project_link']);
                    $('#pilihan').val('choice2');
                    if (candidate['project_link_2']) {
                        $('#address').val(candidate['project_link_2']);
                        $('#address').prop('disabled', true);
                    }
                } else {
                    $('.penjelasan').text('Tidak ada project');
                }
            });

            $('#submit').on('click', function() {
                $(".loader-container").css('z-index', 10000);
                $(".loader-container").css('visibility', 'visible');
            });
        });

        function submitProject() {
            Swal.fire({
                title: 'Submit Project',
                text: "Are you sure you want to submit this project?",
                icon: 'warning',
                showCancelButton: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`{{ route('project.submit') }}`, {
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            method: 'POST',
                            body: JSON.stringify({
                                submission: $('#address').val(),
                                pilihan: $('#pilihan').val(),
                            })
                        }).then(response => response.json())
                        .then(response => {
                            if (response.success) {
                                Swal.fire({
                                    title: 'Success',
                                    text: response.message,
                                    icon: 'success',
                                }).then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    title: 'Error',
                                    text: response.message,
                                    icon: 'error',
                                });
                            }
                        }).catch((error) => {
                            Swal.fire({
                                title: 'Error',
                                text: 'Something went wrong',
                                icon: 'error',
                            });
                        });
                }
            });
        }
    </script>
@endsection
