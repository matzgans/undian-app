<x-app-layout>
    <div class="py-5">
        <div class="mx-auto max-w-[90rem] sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="px-6 pb-6 pt-6 text-xl font-bold text-gray-500">
                    {{ __('Daftar Pemenang') }}
                </div>
                <div class="mt-3 flex px-6">
                    <div class="me-3 w-full">
                        <form class="max-w-full" action="{{ route('undian.show') }}">
                            <label class="sr-only mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="default-search">Search</label>
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                                    <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                <input
                                    class="focus:border-greenbg-green-600 focus:ring-greenbg-green-600 dark:focus:border-greenbg-green-600 dark:focus:ring-greenbg-green-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-4 ps-10 text-sm text-gray-900 dark:border-gray-600 dark:bg-white dark:text-black dark:placeholder-gray-400"
                                    id="default-search" name="search" type="search" value="{{ request('search') }}"
                                    placeholder="Masukan Nama" />
                                <button
                                    class="absolute bottom-2.5 end-2.5 rounded-lg bg-green-600 px-4 py-2 text-sm font-medium text-white hover:bg-orange-400 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                    type="submit">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="w-ful">
                    <div class="relative overflow-x-auto px-6 pb-3 shadow-md sm:rounded-lg">
                        <table class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
                            <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-white dark:text-black">
                                <tr>
                                    <th class="px-6 py-3" scope="col">
                                        No
                                    </th>
                                    <th class="px-6 py-3" scope="col">
                                        Nomor KTP
                                    </th>
                                    <th class="px-6 py-3" scope="col">
                                        Nama
                                    </th>
                                    <th class="px-6 py-3" scope="col">
                                        Nomor Tiket
                                    </th>
                                    <th class="px-6 py-3" scope="col">
                                        Nomor Telephone
                                    </th>
                                    <th class="px-6 py-3" scope="col">
                                        Alamat
                                    </th>
                                    <th class="px-6 py-3" scope="col">
                                        Hadiah
                                    </th>
                                    <th class="px-6 py-3" scope="col">
                                        Foto Ktp
                                    </th>
                                    <th class="px-6 py-3" scope="col">
                                        Aksi
                                    </th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($winners as $winner)
                                    <tr
                                        class="border-b odd:bg-white even:bg-gray-50 dark:border-gray-700 dark:text-black odd:dark:bg-white odd:dark:text-black even:dark:bg-white">
                                        <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-black"
                                            scope="row">
                                            {{ ($winners->currentPage() - 1) * $winners->perPage() + $loop->iteration }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $winner->ktp_id }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $winner->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $winner->ticket_number }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $winner->phone }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $winner->address }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $winner->prize_name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <a class="dark:focus:ring-[#3b5998]/55 text-nowrap mb-2 me-2 inline-flex items-center rounded-lg bg-orange-500 px-5 py-2 text-center text-sm font-medium text-white hover:bg-orange-400 focus:outline-none focus:ring-4 focus:ring-[#3b5998]/50"
                                                data-image="{{ asset($winner->ktp_image) }}" onclick="openModal(this)">
                                                <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>
                                            </a>
                                        </td>

                                        <td class="px-6 py-4">
                                            <a href="javascript:void(0);" onclick="confirmDelete({{ $winner->id }})">
                                                <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="red">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </a>
                                            <form id="delete-form-{{ $winner->id }}" style="display: none;"
                                                action="{{ route('winner.destroy', ['winner' => $winner->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3 dark:text-white">
                            {{ $winners->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="fixed inset-0 flex hidden items-center justify-center bg-black bg-opacity-50" id="ktpModal">
        <div class="w-full max-w-sm rounded-lg bg-white p-4">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold">Gambar KTP</h2>
                <button class="text-black" onclick="closeModal()">&times;</button>
            </div>
            <div class="mt-4">
                <!-- Tampilan Gambar KTP -->
                <img class="h-full w-full" id="ktpImage" src="" alt="Gambar KTP">
            </div>
        </div>
    </div>
    </div>
    @push('after-scripts')
        <script>
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

            function openModal(button) {
                console.log(button);

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

            function confirmDelete(itemId) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + itemId).submit();
                    }
                });
            }
        </script>
    @endpush
</x-app-layout>
