<x-landing-layout>
    <div class="flex min-h-screen items-center justify-center bg-gray-100 p-5">
        <div
            class="max-w-sm rounded-lg border border-gray-200 bg-white p-6 shadow dark:border-orange-800 dark:bg-white dark:shadow-lg">
            <form class="max-w-full" action="{{ route('tickets.show') }}">
                <label class="sr-only mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    for="default-search">CEK</label>
                <div class="relative">
                    <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                        <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input
                        class="focus:border-greenbg-green-600 focus:ring-greenbg-green-600 dark:focus:border-greenbg-green-600 dark:focus:ring-greenbg-green-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-4 ps-10 text-sm text-gray-900 dark:border-gray-600 dark:bg-white dark:text-gray-500 dark:placeholder-gray-400"
                        id="default-search" name="check_tickets" type="number" value="{{ request('check_tickets') }}"
                        placeholder="Masukan KTP" required />
                    <button
                        class="absolute bottom-2.5 end-2.5 rounded-lg bg-green-600 px-4 py-2 text-sm font-medium text-white hover:bg-orange-400 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="submit">CEK KTP</button>

                </div>
                @if (!$participant)
                    <p class="mt-3 text-center text-red-600">kosong, Silahkan Masukan Nomor Ktp Anda dengan Benar</p>
                @else
                    <p class="mt-3 text-center">Hallo {{ $participant->name }} Nomor Ticket Anda
                        <span class="text-wrap font-bold text-orange-700">{{ $participant->ticket_number }}</span>,
                        Simpan dan
                        Screenshot Nomor Ticket Anda
                    </p>
                @endif
            </form>

        </div>
    </div>
    @push('after-scripts')
        <script>
            @if (session('success'))
                Swal.fire({
                    icon: "success",
                    title: "Berhasil Simpan data",
                    showConfirmButton: false,
                    timer: 1500
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
</x-landing-layout>
