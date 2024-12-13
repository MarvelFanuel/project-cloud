@extends('admin.layout')

@section('content')
    <section class="w-screen flex justify-center py-16">
        <div class="flex flex-col w-11/12 py-8 rounded-lg shadow-xl items-center justify-center mb-10">
            <div class="px-8 w-full mb-3">
                <div class="relative mb-4 flex w-full flex-wrap items-stretch">
                    <input id="advanced-search-input" type="search"
                        class="relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none"
                        placeholder="Search" aria-label="Search" aria-describedby="button-addon1" />

                    <!--Search button-->
                    <button
                        class="relative z-[2] flex items-center rounded-r bg-primary px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-primary-700 hover:shadow-lg focus:bg-primary-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg"
                        type="button" id="advanced-search-button" data-te-ripple-init data-te-ripple-color="light">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                            <path fill-rule="evenodd"
                                d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
            <div id="datatable" class="w-full px-5 py-5" data-te-fixed-header="true"></div>

        </div>
    </section>


    <!-- Details Modal -->
    <div data-twe-modal-init
        class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
        id="detailsModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
        <div data-twe-modal-dialog-ref
            class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
            <div
                class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-4 outline-none">
                <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 p-4">
                    <!-- Modal title -->
                    <h5 class="text-xl font-bold leading-normal text-surface" id="exampleModalCenterTitle">
                        Detail Pendaftar
                    </h5>
                    <!-- Close button -->
                    <button type="button"
                        class="box-content rounded-none border-none text-neutral-500 hover:text-neutral-800 hover:no-underline focus:text-neutral-800 focus:opacity-100 focus:shadow-none focus:outline-none"
                        data-twe-modal-dismiss aria-label="Close">
                        <span class="[&>svg]:h-6 [&>svg]:w-6">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </span>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="relative p-4 space-y-4">
                    <h2 class="text-lg font-bold text-gray-800">Applicant Details</h2>
                    <div class="grid grid-cols-1 gap-4">
                        <!-- Personal Information -->
                        <div>
                            <h3 class="text-md font-semibold text-black text-lg">Personal Information</h3>
                            <input type="hidden" id="detail-id">
                            <p><span class="font-medium">Name:</span> <span id="detail-name" class="text-gray-700"></span>
                            </p>
                            <p><span class="font-medium">Email:</span> <span id="detail-email" class="text-gray-700"></span>
                            </p>
                            <p><span class="font-medium">Phone:</span> <span id="detail-phone" class="text-gray-700"></span>
                            </p>
                            <p><span class="font-medium">Address:</span> <span id="detail-address"
                                    class="text-gray-700"></span></p>
                            <p><span class="font-medium">Gender:</span> <span id="detail-gender"
                                    class="text-gray-700"></span>
                            </p>
                            <p><span class="font-medium">Birthplace:</span> <span id="detail-birth_place"
                                    class="text-gray-700"></span></p>
                            <p><span class="font-medium">Birthdate:</span> <span id="detail-birth_date"
                                    class="text-gray-700"></span></p>
                            <p><span class="font-medium">Religion:</span> <span id="detail-religion"
                                    class="text-gray-700"></span></p>
                            <p><span class="font-medium">Major:</span> <span id="detail-major" class="text-gray-700"></span>
                            </p>
                            <p><span class="font-medium">GPA:</span> <span id="detail-gpa" class="text-gray-700"></span></p>
                            <p><span class="font-medium">Line ID:</span> <span id="detail-line_id"
                                    class="text-gray-700"></span></p>
                            <p><span class="font-medium">Instagram:</span> <span id="detail-instagram"
                                    class="text-gray-700"></span></p>
                        </div>



                        <!-- Experiences -->
                        <div>
                            <h3 class="text-md font-semibold text-black text-lg">Experiences</h3>
                            <p><span class="font-medium">Motivation:</span> <span id="detail-motivation"
                                    class="text-gray-700"></span></p>
                            <p><span class="font-medium">Strength:</span> <span id="detail-strength"
                                    class="text-gray-700"></span></p>
                            <p><span class="font-medium">Weakness:</span> <span id="detail-weakness"
                                    class="text-gray-700"></span></p>
                            <p><span class="font-medium">Organization Experience:</span> <span
                                    id="detail-organization_experience" class="text-gray-700"></span></p>
                            <p><span class="font-medium">Committee Experience:</span> <span
                                    id="detail-committee_experience" class="text-gray-700"></span></p>
                        </div>

                        <!-- Supporting Documents -->
                        <div>
                            <h3 class="text-md font-semibold text-black text-lg">Documents</h3>
                            <p><span class="font-medium">Portfolio:</span> <span id="detail-portfolio"
                                    class="text-gray-700"></span></p>
                            <p class="text-lg font-bold">KTM:</p>
                            <img id="detail-ktm" class="mb-4" src="" alt="">
                            <p class="text-lg font-bold">Grade:</p>
                            <img id="detail-grade" class="mb-4" src="" alt="">
                            <p class="text-lg font-bold">SKKK:</p>
                            <img id="detail-skkk" class="mb-4" src="" alt="">
                            <p class="text-lg font-bold">Photo:</p>
                            <img id="detail-photo" class="mb-4" src="" alt="">
                            <p class="text-lg font-bold">Bukti Kecurangan:</p>
                            <img id="detail-cheats" class="mb-4" src="" alt="">
                        </div>

                        <!-- Other Details -->
                        <div>
                            <h3 class="text-md font-semibold text-black text-lg">Other Details</h3>
                            <p><span class="font-medium">Acceptance Status:</span> <span id="detail-acceptance"
                                    class="text-gray-700"></span></p>
                            <p><span class="font-medium">Phase:</span> <span id="detail-phase"
                                    class="text-gray-700"></span></p>
                            <p><span class="font-medium">Choice 1:</span> <span id="detail-choice_1"
                                    class="text-gray-700"></span></p>
                            <p><span class="font-medium">Choice 2:</span> <span id="detail-choice_2"
                                    class="text-gray-700"></span></p>
                            <p><span class="font-medium">Project Deadline 1:</span> <span id="detail-project_deadline_1"
                                    class="text-gray-700"></span></p>
                            <p><span class="font-medium">Project Deadline 2:</span> <span id="detail-project_deadline_2"
                                    class="text-gray-700"></span></p>
                            <p><span class="font-medium">Project Link 1:</span> <span id="detail-project_link_1"
                                    class="text-gray-700"></span></p>
                            <p><span class="font-medium">Project Link 2:</span> <span id="detail-project_link_2"
                                    class="text-gray-700"></span></p>
                        </div>
                    </div>
                </div>


                <!-- Modal footer -->
                <div
                    class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 p-4">
                    <button type="button"
                        class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out"
                        data-twe-modal-dismiss data-twe-ripple-init data-twe-ripple-color="teal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const customDatatable = document.getElementById("datatable");
        const data = @json($applicants);

        const instance = new te.Datatable(
            customDatatable, {
                columns: [{
                        label: "nrp",
                        field: "email",
                        sort: true
                    }, {
                        label: "Nama",
                        field: "name",
                        sort: true
                    }, {
                        label: "Pilihan 1",
                        field: "choice1",
                        sort: true
                    }, {
                        label: "Pilihan 2",
                        field: "choice2",
                        sort: true
                    },

                    {
                        label: "Actions",
                        field: "actions",
                        sort: true
                    },
                ],
                rows: data.map((applicant, i) => {
                    const isInterviewed = applicant.phase == 3;
                    return {
                        ...applicant,
                        description: `<p class="text-wrap">${applicant.description}</p>`,
                        email: `<p class="text-wrap">${applicant.email.substring(0,9)}</p>`,
                        choice1: `<p class="text-wrap">${applicant.choice1.name}</p>`,
                        choice2: `<p class="text-wrap">${applicant.choice2.name}</p>`,
                        actions: `
                        <div class="flex">
                            <button
                                id="${applicant.id}" 
                                data-te-ripple-init 
                                data-te-ripple-color="light" 
                                data-twe-toggle="modal" 
                                data-twe-target="#detailsModal"
                                data-name="${applicant.name}" 
                                data-email="${applicant.email}" 
                                data-phone="${applicant.phone}" 
                                data-address="${applicant.address}" 
                                data-gender="${applicant.gender}" 
                                data-birth_place="${applicant.birth_place}" 
                                data-birth_date="${applicant.birth_date}" 
                                data-religion="${applicant.religion}" 
                                data-major="${applicant.major}" 
                                data-gpa="${applicant.gpa}" 
                                data-line_id="${applicant.line_id}" 
                                data-instagram="${applicant.instagram}" 
                                data-motivation="${applicant.motivation}" 
                                data-strength="${applicant.strength}" 
                                data-weakness="${applicant.weakness}" 
                                data-organization_experience="${applicant.organization_experience}" 
                                data-committee_experience="${applicant.committee_experience}" 
                                data-portfolio="${applicant.portfolio}" 
                                data-ktm="${applicant.ktm}" 
                                data-grade="${applicant.grade}" 
                                data-skkk="${applicant.skkk}" 
                                data-photo="${applicant.photo}" 
                                data-cheats="${applicant.cheats}" 
                                data-acceptance="${applicant.acceptance}" 
                                data-phase="${applicant.phase}" 
                                data-choice_1="${applicant.choice1.name}" 
                                data-choice_2="${applicant.choice2.name}" 
                                data-project_deadline_1="${applicant.project_deadline_1}" 
                                data-project_deadline_2="${applicant.project_deadline_2}" 
                                data-project_link_1="${applicant.project_link_1}" 
                                data-project_link_2="${applicant.project_link_2}" 
                                class="details-button mr-3 btn-detail block rounded bg-primary px-6 pb-2 pt-2.5 text-xs text-center font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)]">
                                Details
                            </button>
                            <button
                            onclick="validateInterview('${applicant.id}')"
                            class="mr-3 btn-detail block rounded ${isInterviewed ? 'bg-success' : 'bg-warning'} px-6 pb-2 pt-2.5 text-xs text-center font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)]"
                            ${isInterviewed ? 'disabled' : ''}
                        >
                            ${isInterviewed ? 'Interviewed' : 'Validate Interview'}
                        </button>
                        `
                    };

                }),
            }, {
                hover: true,
                stripped: true
            },
        );

        const advancedSearchInput = document.getElementById('advanced-search-input');

        const search = (value) => {
            let [phrase, columns] = value.split(" in:").map((str) => str.trim());

            if (columns) {
                columns = columns.split(",").map((str) => str.toLowerCase().trim());
            }

            instance.search(phrase, columns);
        };

        document.getElementById("advanced-search-button").addEventListener("click", () => {
            search(advancedSearchInput.value);
        });

        advancedSearchInput.addEventListener("keydown", (e) => {
            search(e.target.value);
        });

        document.querySelectorAll('.details-button').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.id;
                document.getElementById('detail-id').innerText = id;

                const name = this.getAttribute('data-name');
                document.getElementById('detail-name').innerText = name;

                const email = this.getAttribute('data-email');
                document.getElementById('detail-email').innerText = email;

                const phone = this.getAttribute('data-phone');
                document.getElementById('detail-phone').innerText = phone;

                const address = this.getAttribute('data-address');
                document.getElementById('detail-address').innerText = address;

                const gender = this.getAttribute('data-gender');
                document.getElementById('detail-gender').innerText = gender;

                const birth_place = this.getAttribute('data-birth_place');
                document.getElementById('detail-birth_place').innerText = birth_place;

                const birth_date = this.getAttribute('data-birth_date');
                document.getElementById('detail-birth_date').innerText = birth_date;

                const religion = this.getAttribute('data-religion');
                document.getElementById('detail-religion').innerText = religion;

                const major = this.getAttribute('data-major');
                document.getElementById('detail-major').innerText = major;

                const gpa = this.getAttribute('data-gpa');
                document.getElementById('detail-gpa').innerText = gpa;

                const line_id = this.getAttribute('data-line_id');
                document.getElementById('detail-line_id').innerText = line_id;

                const instagram = this.getAttribute('data-instagram');
                document.getElementById('detail-instagram').innerText = instagram;

                const motivation = this.getAttribute('data-motivation');
                document.getElementById('detail-motivation').innerText = motivation;

                const strength = this.getAttribute('data-strength');
                document.getElementById('detail-strength').innerText = strength;

                const weakness = this.getAttribute('data-weakness');
                document.getElementById('detail-weakness').innerText = weakness;

                const organization_experience = this.getAttribute('data-organization_experience');
                document.getElementById('detail-organization_experience').innerText =
                    organization_experience;

                const committee_experience = this.getAttribute('data-committee_experience');
                document.getElementById('detail-committee_experience').innerText = committee_experience;

                const portfolio = this.getAttribute('data-portfolio');
                document.getElementById('detail-portfolio').innerText = portfolio;

                const ktm = this.getAttribute('data-ktm');
                document.getElementById('detail-ktm').src = `https://laravelcloudproject.s3.us-east-1.amazonaws.com/uploads/${ktm}`;

                const grade = this.getAttribute('data-grade');
                document.getElementById('detail-grade').src = `https://laravelcloudproject.s3.us-east-1.amazonaws.com/uploads/${grade}`;

                const skkk = this.getAttribute('data-skkk');
                document.getElementById('detail-skkk').src = `https://laravelcloudproject.s3.us-east-1.amazonaws.com/uploads/${skkk}`;

                const photo = this.getAttribute('data-photo');
                document.getElementById('detail-photo').src = `https://laravelcloudproject.s3.us-east-1.amazonaws.com/uploads/${photo}`;

                const cheats = this.getAttribute('data-cheats');
                document.getElementById('detail-cheats').src = `https://laravelcloudproject.s3.us-east-1.amazonaws.com/uploads/${cheats}`;

                const acceptance = this.getAttribute('data-acceptance');
                document.getElementById('detail-acceptance').innerText = acceptance;

                const phase = this.getAttribute('data-phase');
                document.getElementById('detail-phase').innerText = phase;

                const choice_1 = this.getAttribute('data-choice_1');
                document.getElementById('detail-choice_1').innerText = choice_1;

                const choice_2 = this.getAttribute('data-choice_2');
                document.getElementById('detail-choice_2').innerText = choice_2;

                const project_deadline_1 = this.getAttribute('data-project_deadline_1');
                document.getElementById('detail-project_deadline_1').innerText = project_deadline_1;

                const project_deadline_2 = this.getAttribute('data-project_deadline_2');
                document.getElementById('detail-project_deadline_2').innerText = project_deadline_2;

                const project_link_1 = this.getAttribute('data-project_link_1');
                document.getElementById('detail-project_link_1').innerText = project_link_1;

                const project_link_2 = this.getAttribute('data-project_link_2');
                document.getElementById('detail-project_link_2').innerText = project_link_2;


            });
        });

        function validateInterview(id) {
            Swal.fire({
                title: 'Validate Interview',
                text: 'Are you sure you want to validate this interview?',
                icon: 'warning',
                showCancelButton: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Loading...',
                        allowOutsideClick: false,
                        showConfirmButton: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    fetch(`{{ route('admin.validateInterview') }}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                id
                            })
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: data.message
                                }).then(() => {
                                    window.location.reload();
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: data.message
                                });
                            }
                        })
                        .catch(err => {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Something went wrong'
                            });
                        });
                }
            });
        }
    </script>
@endsection
