<x-landing-layout>
    <div class="relative h-96 w-full bg-black p-2" id="controls-carousel" data-carousel="static">
        <!-- Carousel wrapper -->
        <div class="relative h-full overflow-hidden rounded-lg">
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img class="absolute left-1/2 top-1/2 block max-h-full max-w-full -translate-x-1/2 -translate-y-1/2"
                    src="{{ asset('images/landing-page/3c8c0a16-c715-4958-8749-19329c222cbe.jpeg') }}" alt="...">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                <img class="absolute left-1/2 top-1/2 block max-h-full max-w-full -translate-x-1/2 -translate-y-1/2"
                    src="{{ asset('images/landing-page/8a1c4f30-e3e1-4de1-a47e-25de8235c412.jpeg') }}" alt="...">
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img class="absolute left-1/2 top-1/2 block max-h-full max-w-full -translate-x-1/2 -translate-y-1/2"
                    src="{{ asset('images/landing-page/a7469b2c-1f81-4e1b-956f-fdd07680a11e.jpeg') }}" alt="...">
            </div>
        </div>
        <!-- Slider controls -->
        <button
            class="group absolute start-0 top-1/2 z-30 flex h-10 w-10 -translate-y-1/2 cursor-pointer items-center justify-center px-4 focus:outline-none"
            data-carousel-prev type="button">
            <span
                class="dark:bg-gray-h/30 inline-flex h-10 w-10 items-center justify-center rounded-full bg-white/30 group-hover:bg-white/50 group-focus:outline-none group-focus:ring-4 group-focus:ring-white dark:group-hover:bg-gray-800/60 dark:group-focus:ring-gray-800/70">
                <svg class="h-4 w-4 text-white rtl:rotate-180 dark:text-gray-800" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button
            class="group absolute end-0 top-1/2 z-30 flex h-10 w-10 -translate-y-1/2 cursor-pointer items-center justify-center px-4 focus:outline-none"
            data-carousel-next type="button">
            <span
                class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-white/30 group-hover:bg-white/50 group-focus:outline-none group-focus:ring-4 group-focus:ring-white dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 dark:group-focus:ring-gray-800/70">
                <svg class="h-4 w-4 text-white rtl:rotate-180 dark:text-gray-800" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>




    <div class="mt-10 text-center">
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-amber-950 md:text-5xl lg:text-6xl">
            Kupon Undian Diary Fest Baubau Berjaya Bersama Ari Yasin</h1>
    </div>

    <form class="mx-auto max-w-full p-5" id="form" action="{{ route('participant.store') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="mb-5">
            <label class="mb-2 block text-sm font-bold text-gray-700" for="username">
                Nama Lengkap :
            </label>
            <input
                class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none"
                id="username" name="name" type="text" placeholder="Nama Lengkap">
        </div>
        <div class="mb-5">
            <label class="mb-2 block text-sm font-bold text-gray-700" for="no_ktp">
                Nomor KTP :
            </label>
            <input
                class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none"
                id="ktp_id" name="ktp_id" type="text" title="Nomor KTP harus terdiri dari 16 digit angka"
                placeholder="Nomor KTP" required pattern="\d{16}">
        </div>
        <div class="mb-5">
            <label class="mb-2 block text-sm font-bold text-gray-700" for="address">
                Alamat : </label>
            <input
                class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none"
                id="address" name="address" type="text" placeholder="Alamat" required />
        </div>
        <div class="mb-5">
            <label class="mb-2 block text-sm font-bold text-gray-700" for="phone">
                No Hp : </label>
            <input
                class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none"
                id="phone" name="phone" type="text" placeholder="Nomor Handphone" required />
        </div>
        <label class="mb-2 block text-sm font-medium text-black" for="default_size">Upload KTP:</label>
        <p class="text-sm text-orange-900">Pastikan ukuran file maksimal 500Kb dan dalam format JPG/JPEG/PNG.</p>
        <input
            class="mb-5 block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:outline-none dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:placeholder-gray-400"
            id="default_size" name="ktp_image" type="file" accept=".jpg, .jpeg" required onchange="validateFile()">
        <button
            class="mb-5 block w-full cursor-pointer rounded-lg bg-green-800 p-5 text-sm text-white hover:bg-green-600 focus:outline-none dark:border-green-800 dark:bg-green-800 dark:text-white dark:placeholder-amber-400"
            type="submit">Submit</button>
        <div class="mb-5 flex items-start">
            <div class="flex h-5 items-center">

            </div>
        </div>

    </form>
    @push('after-scripts')
        <script>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: '{{ $error }}',
                    });
                    console.log("oops")
                @endforeach
            @endif
        </script>
    @endpush
</x-landing-layout>
