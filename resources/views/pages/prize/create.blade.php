<x-app-layout>
    <div class="py-8">
        <div class="mx-auto max-w-xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="flex justify-between px-6 pt-6 text-xl font-bold text-gray-500">
                    <div>
                        {{ __('Tambah Data Hadiah') }}
                    </div>
                    <a class="bg-slate-400 px-3 py-2" href="{{ route('prize.index') }}">
                        <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="3" stroke="white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                        </svg>

                    </a>
                </div>
                <div class="w-full">
                    <form class="max-w-full p-5" action="{{ route('prize.store') }}" method="POST">
                        @csrf
                        <div class="">
                            <div class="mb-2">
                                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-black"
                                    for="nama">Nama</label>
                                <input
                                    class="block w-full max-w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-white dark:text-black dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                    id="nama" name="name" type="text" />
                            </div>
                        </div>
                        <button
                            class="w-full rounded-lg bg-orange-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-orange-600 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto"
                            type="submit">Submit</button>
                    </form>
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
        </script>
    @endpush

</x-app-layout>
