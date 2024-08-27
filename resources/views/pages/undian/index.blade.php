<x-app-layout>
    <div class="py-5">
        <div class="mx-auto max-w-[90rem] sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="px-6 pt-6 text-xl font-bold text-gray-500 pb-6">
                    {{ __('Undian') }}
                </div>
                <button
                    class="rounded-lg bg-green-700 px-5 ml-5 py-2.5 text-center text-sm font-medium text-white hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto"
                    type="submit"><a href="/">Tambah Data Hadiah</a></button>
                <button
                    class="rounded-lg bg-green-700 px-5 ml-5 py-2.5 text-center text-sm font-medium text-white hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto"
                    type="submit"><a href="/">Lihat Data Pemenang</a></button>
                <div class="w-ful">
                    <form class="mx-auto max-w-full p-5" action="{{ route('undian.store') }}" method="post">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                            <div class="mb-2">
                                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                    for="prize">Hadiah</label>
                                <select id="prize"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    name="prize" required>
                                    <option disabled selected value="">Pilih Hadiah </option>
                                    @foreach ($prizes as $prize)
                                        <option value="{{ $prize->id }}">{{ $prize->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-2">
                                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                    for="name">Jumlah Pemenang</label>
                                <input
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                    id="total_winner" name="total_winner" type="numbermn" required />
                            </div>
                        </div>
                        <button
                            class="rounded-lg bg-orange-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-orange-600 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto"
                            type="submit">Submit</button>
                    </form>


                </div>
            </div>


            @if (session('success'))
                @foreach (session('participants') as $index => $participant)
                    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg my-5">
                        <div class="px-6 pt-6 text-xl font-bold text-gray-500 pb-6">
                            Pemenang Ke : {{ $index + 1 }}

                        </div>
                        <div class="w-full">
                            <form class="mx-auto max-w-full p-5">
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="mb-2">
                                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                            for="ktp_id">Ktp ID</label>
                                        <input
                                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                            id="ktp_id" name="ktp_id" type="number"
                                            value="{{ $participant->ktp_id }}" disabled />
                                    </div>
                                    <div class="mb-2">
                                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                            for="name">Nama</label>
                                        <input
                                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                            id="name" name="name" type="text"
                                            value="{{ $participant->name }}" disabled />
                                    </div>
                                    <div class="mb-2">
                                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                            for="phone">Phone</label>
                                        <input
                                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                            id="phone" name="phone" type="text"
                                            value="{{ $participant->phone }}" disabled />
                                    </div>
                                    <div class="mb-2">
                                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                            for="ticket_number">Tiker Number</label>
                                        <input
                                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                            id="ticket_number" name="ticket_numnber" type="text"
                                            value="{{ $participant->ticket_number }}" disabled />
                                    </div>
                                    <div class="">
                                        @if ($participant->ktp_image)
                                            <img class="w-48 object-cover" id="previewImage"
                                                src="{{ asset($participant->ktp_image) }}" alt="Gambar KTP">
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                        for="address">Alamat</label>
                                    <textarea
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                        id="address" name="address" rows="4" placeholder="Masukan Alamat" disabled>{{ $participant->address }}</textarea>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach

            @endif
        </div>


    </div>
    @push('after-scripts')
        <script>
            function openModal(button) {
                // Ambil URL gambar dari data-attribute
                var imageUrl = button.getAttribute('data-image');

                // Setel gambar pada modal
                document.getElementById('ktpImage').src = imageUrl;

                // Tampilkan modal
                document.getElementById('ktpModal').classList.remove('hidden');
            }

            function closeModal() {
                // Sembunyikan modal
                document.getElementById('ktpModal').classList.add('hidden');
            }

            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Pemenang',
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
