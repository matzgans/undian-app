<x-app-layout>
    <div class="py-8">
        <div class="mx-auto max-w-[90rem] sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="px-6 pt-6 text-xl font-bold text-gray-500">
                    {{ __('Edit Data Participant') }}
                </div>
                <div class="w-full">
                    <form class="mx-auto max-w-full p-5"
                        action="{{ route('participant.update', ['participant' => $participant->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-2 gap-4">
                            <div class="mb-2">
                                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-black"
                                    for="ktp_id">Ktp ID</label>
                                <input
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-white dark:text-black dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                    id="ktp_id" name="ktp_id" type="number" value="{{ $participant->ktp_id }}"
                                    disabled />
                            </div>
                            <div class="mb-2">
                                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-black"
                                    for="name">Nama</label>
                                <input
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-white dark:text-black dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                    id="name" name="name" type="text" value="{{ $participant->name }}" />
                            </div>
                            <div class="mb-2">
                                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-black"
                                    for="phone">Phone</label>
                                <input
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-white dark:text-black dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                    id="phone" name="phone" type="text" value="{{ $participant->phone }}" />
                            </div>
                            <div class="mb-2">
                                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-black"
                                    for="ticket_number">Tiker Number</label>
                                <input
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-white dark:text-black dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                    id="ticket_number" name="ticket_numnber" type="text"
                                    value="{{ $participant->ticket_number }}" disabled />
                            </div>
                            <div class="">
                                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-black"
                                    for="ktp_image">Gambar KTP</label>
                                <input
                                    class="mb-5 block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:outline-none dark:border-gray-600 dark:bg-white dark:text-gray-400 dark:placeholder-gray-400"
                                    id="ktp_image" name="ktp_image" type="file" accept="image/*"
                                    onchange="previewImage()">
                            </div>
                            <div class="">
                                @if ($participant->ktp_image)
                                    <img class="w-48 object-cover" id="previewImage"
                                        src="{{ asset($participant->ktp_image) }}" alt="Gambar KTP">
                                @endif
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-black"
                                for="address">Alamat</label>
                            <textarea
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-white dark:text-black dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                id="address" name="address" rows="4" placeholder="Masukan Alamat">{{ $participant->address }}</textarea>
                        </div>
                        <button
                            class="rounded-lg bg-orange-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-orange-600 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto"
                            type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('after-scripts')
        <script>
            function previewImage() {
                const fileInput = document.getElementById('ktp_image');
                const preview = document.getElementById('imagePreview');
                const file = fileInput.files[0];
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden'); // Tampilkan gambar preview
                }

                if (file) {
                    reader.readAsDataURL(file);
                } else {
                    preview.classList.add('hidden'); // Sembunyikan gambar preview jika tidak ada file
                }
            }
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    timer: 3000,
                    showConfirmButton: false
                });
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: '{{ $error }}',
                    });
                @endforeach
            @endif
        </script>
    @endpush

</x-app-layout>
