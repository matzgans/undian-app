<x-landing-layout>
    <div class="flex items-center justify-center min-h-screen bg-gray-100 p-5">
        <div
            class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">
                    {{ session('ticket_number') }}</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Selamat! Anda telah menerima Tiket Undian
                "DIARY"
                dengan nomor unik: {{ session('ticket_number') }}. Simpan tiket ini dengan baik atau screenshoot, karena
                ini
                adalah kunci
                Anda untuk memenangkan hadiah menarik.
            </p>

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
