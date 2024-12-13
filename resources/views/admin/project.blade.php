@extends('admin.layout')


@section('content')
    <section class="w-screen flex justify-center py-24">
        <div class="w-[600px] flex flex-col justify-center items-center shadow-xl gap-4 p-8 border border-black rounded-xl">
            @foreach ($divisions as $division)
                <div class="w-full">
                    <p>{{ $division->name }}</p>
                    <div class="flex gap-x-4">
                        <input type="text" value="{{ $division->project_link }}" class="border border-black rounded w-full"
                            id="{{ 'division-' . $division->id }}">
                        <button class="bg-blue-500 text-white rounded px-4 py-2" data-te-ripple-init
                            data-te-ripple-color="light"
                            onclick="updateLink('{{ $division->id }}', '{{ $division->name }}')">Update</button>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <script>
        function updateLink(id, name) {
            Swal.fire({
                title: "Update Project Link",
                text: `Are you sure to update ${name} link`,
                icon: "warning",
                showCancelButton: true,
            }).then((result) => {
                if (result.isConfirmed) {

                    const link = document.querySelector(`#division-${id}`).value;
                    fetch(`{{ route('admin.updateLink', '') }}/${id}`, {
                            method: 'PUT',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                link: link
                            })
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire({
                                    title: "Success!",
                                    icon: "success",
                                    text: data.message,
                                })
                            } else {
                                Swal.fire({
                                    title: "Error",
                                    icon: "error",
                                    text: data.message,
                                })
                            }
                        }).catch(err => {
                            Swal.fire({
                                title: "Error",
                                icon: "error",
                                text: "Something went wrong",
                            })
                        })
                }
            });
        }
    </script>
@endsection
