<x-app-layout>
    <div class="py-5">
        <div class="mx-auto max-w-[90rem] sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="px-6 pt-6 text-xl font-bold text-gray-500">
                    {{ __('Data Hadiah') }}
                </div>
                <div class="mt-3 flex px-6">
                    <div class="me-3 w-full">
                        <form class="max-w-full" action="{{ route('prize.index') }}">
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

                    <a class="dark:focus:ring-[#3b5998]/55 text-nowrap mb-2 me-2 inline-flex items-center rounded-lg bg-green-600 px-5 py-3.5 text-center text-sm font-medium text-white hover:bg-orange-400 focus:outline-none focus:ring-4 focus:ring-[#3b5998]/50"
                        href="{{ route('prize.create') }}">
                        <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Tambah Data Hadiah
                    </a>

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
                                        Nama
                                    </th>
                                    <th class="px-6 py-3" scope="col">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($prizes as $prize)
                                    <tr
                                        class="border-b odd:bg-white even:bg-gray-50 dark:border-gray-700 dark:text-black odd:dark:bg-white odd:dark:text-black even:dark:bg-white">
                                        <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-black"
                                            scope="row">
                                            {{ ($prizes->currentPage() - 1) * $prizes->perPage() + $loop->iteration }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $prize->name }}
                                        </td>
                                        <td class="flex px-6 py-4">
                                            {{-- <a
                                                href="{{ route('participant.edit', ['participant' => $participant->id]) }}">
                                                <svg class="size-6 me-3" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="orange">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                                </svg>
                                            </a> --}}
                                            <a href="javascript:void(0);" onclick="confirmDelete({{ $prize->id }})">
                                                <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="red">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </a>
                                            <form id="delete-form-{{ $prize->id }}" style="display: none;"
                                                action="{{ route('prize.destroy', ['prize' => $prize->id]) }}"
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
                            {{ $prizes->links() }}
                        </div>
                    </div>


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
