{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net" rel="preconnect">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <nav class="bg-amber-700 hover:bg-amber-800">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
                <span class="self-center text-3xl font-black whitespace-nowrap text-white">ARI - YASIN</span>
            </a>

            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <button type="button"
                    class="text-white bg-white hover:bg-amber-800 focus:ring-4 focus:outline-none focus:ring-white font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-amber-600 dark:hover:bg-amber-700 dark:focus:ring-white">Isi
                    Form</button>
            </div>
        </div>
    </nav>
    <div class="container mx-auto px-4 pt-5">
        <div id="controls-carousel" class="relative w-full" data-carousel="static">
            <!-- Carousel wrapper -->
            <div class="relative h-screen overflow-hidden rounded-lg md:h-96">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('images/landing-page/3c8c0a16-c715-4958-8749-19329c222cbe.jpeg') }}"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                    <img src="{{ asset('images/landing-page/8a1c4f30-e3e1-4de1-a47e-25de8235c412.jpeg') }}"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('images/landing-page/a7469b2c-1f81-4e1b-956f-fdd07680a11e.jpeg') }}"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
            </div>
            <!-- Slider controls -->
            <button type="button"
                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-h/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button"
                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    </div>

    <div class="container p-4 mb-4 mt-5 text-center">
        <h1
            class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl text-amber-950 ">
            Kupon Undian Diary Fest Baubau Berjaya Bersama Ari Yasin</h1>
    </div>


    <div class=" container mx-auto px-4 pt-5 mb-4">
        <form class="max-w-sm mx-auto">
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-black-100 dark:text-black">Your
                    email</label>
                <input type="email" id="email"
                    class="bg-whiteborder border-white text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-white dark:placeholder-white dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="name@flowbite.com" required />
            </div>
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-black-100 dark:text-black">Your
                    email</label>
                <input type="email" id="email"
                    class="bg-whiteborder border-white text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-white dark:placeholder-white dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="name@flowbite.com" required />
            </div>
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-black-100 dark:text-black">Your
                    email</label>
                <input type="email" id="email"
                    class="bg-whiteborder border-white text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-white dark:placeholder-white dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="name@flowbite.com" required />
            </div>
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-black-100 dark:text-black">Your
                    email</label>
                <input type="email" id="email"
                    class="bg-whiteborder border-white text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-white dark:placeholder-white dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="name@flowbite.com" required />
            </div>
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-black-100 dark:text-black">Your
                    email</label>
                <input type="email" id="email"
                    class="bg-whiteborder border-white text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-white dark:placeholder-white-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="name@flowbite.com" required />
            </div>

            <div class="flex items-start mb-5">
                <div class="flex items-center h-5">

                </div>

            </div>
            <button type="submit"
                class="text-white bg-amber-700 hover:bg-amber-800 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-amber-600 dark:hover:bg-amber-700 dark:focus:ring-amber-800">Submit</button>
        </form>
    </div>


    <div class="footer">
        <footer class="bg-white shadow bg-amber-700 hover:bg-amber-800 ">
            <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
                <div class="sm:flex sm:items-center sm:justify-between">
                    <a href="#" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                        <span
                            class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">#BERJAYA</span>
                        <span
                            class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Laravel</span>
                    </a>
                    <ul
                        class="flex flex-wrap items-center mb-6 text-sm font-medium text-white sm:mb-0 dark:text-white">
                        <li>
                            <a href="#" class="hover:underline me-4 md:me-6">About</a>
                        </li>
                        <li>
                            <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
                        </li>
                        <li>
                            <a href="#" class="hover:underline">Contact</a>
                        </li>
                    </ul>
                </div>
                <hr class="my-6 border-white sm:mx-auto dark:border-white lg:my-8" />
                <span class="block text-sm text-white sm:text-center dark:text-white">© 2023 <a href="#"
                        class="hover:underline">Laravel</a>. All Rights
                    Reserved.</span>
            </div>
        </footer>
    </div>

    @stack('before-scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    @stack('after-scripts')
</body>

</html> --}}


<x-landing-layout>
    <div class="relative w-full p-5" id="controls-carousel" data-carousel="static">
        <!-- Carousel wrapper -->
        <div class="relative h-screen overflow-hidden rounded-lg md:h-96">
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img class="absolute left-1/2 top-1/2 block w-full -translate-x-1/2 -translate-y-1/2"
                    src="{{ asset('images/landing-page/3c8c0a16-c715-4958-8749-19329c222cbe.jpeg') }}" alt="...">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                <img class="absolute left-1/2 top-1/2 block w-full -translate-x-1/2 -translate-y-1/2"
                    src="{{ asset('images/landing-page/8a1c4f30-e3e1-4de1-a47e-25de8235c412.jpeg') }}" alt="...">
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img class="absolute left-1/2 top-1/2 block w-full -translate-x-1/2 -translate-y-1/2"
                    src="{{ asset('images/landing-page/a7469b2c-1f81-4e1b-956f-fdd07680a11e.jpeg') }}" alt="...">
            </div>
        </div>
        <!-- Slider controls -->
        <button
            class="group absolute start-0 top-0 z-30 flex h-full cursor-pointer items-center justify-center px-4 focus:outline-none"
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
            class="group absolute end-0 top-0 z-30 flex h-full cursor-pointer items-center justify-center px-4 focus:outline-none"
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

    <div class="container mb-4 mt-5 p-4 text-center">
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-amber-950 md:text-5xl lg:text-6xl">
            Kupon Undian Diary Fest Baubau Berjaya Bersama Ari Yasin</h1>
    </div>

    <form class="mx-auto max-w-full p-5" action="{{ route('participant.store') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="mb-5">
            <label class="mb-2 block text-sm font-bold text-gray-700" for="username">
                Nama Lengkap :
            </label>
            <input
                class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none"
                id="username" name="name" type="text" placeholder="Username">
        </div>
        <div class="mb-5">
            <label class="mb-2 block text-sm font-bold text-gray-700" for="username">
                Nomor KTP :
            </label>
            <input
                class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none"
                id="username" name="ktp_id" type="number" placeholder="7571xxxxx" required>
        </div>
        <div class="mb-5">
            <label class="text-black-100 mb-2 block text-sm font-medium dark:text-black" for="address">
                Alamat : </label>
            <input
                class="bg-whiteborder block w-full rounded-lg border-white p-2.5 text-sm text-white focus:border-blue-500 focus:ring-blue-500 dark:border-white dark:bg-white dark:text-white dark:placeholder-white dark:focus:border-blue-500 dark:focus:ring-blue-500"
                id="address" name="address" type="text" placeholder="name@flowbite.com" required />
        </div>
        <div class="mb-5">
            <label class="text-black-100 mb-2 block text-sm font-medium dark:text-black" for="phone">
                No Hp : </label>
            <input
                class="bg-whiteborder block w-full rounded-lg border-white p-2.5 text-sm text-white focus:border-blue-500 focus:ring-blue-500 dark:border-white dark:bg-white dark:text-white dark:placeholder-white dark:focus:border-blue-500 dark:focus:ring-blue-500"
                id="phone" name="phone" type="text" placeholder="name@flowbite.com" required />
        </div>
        <label class="mb-2 block text-sm font-medium text-black" for="default_size">Upload
            Ktp</label>
        <input
            class="mb-5 block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:outline-none dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:placeholder-gray-400"
            id="default_size" name="ktp_image" type="file">

        <button
            class="w-full rounded-lg bg-green-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-amber-800 focus:outline-none focus:ring-4 focus:ring-amber-300 dark:bg-amber-600 dark:hover:bg-amber-700 dark:focus:ring-amber-800 sm:w-auto"
            type="submit">Submit</button>
        <div class="mb-5 flex items-start">
            <div class="flex h-5 items-center">

            </div>
        </div>

    </form>
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
</x-landing-layout>

{{-- <x-landing-layout>
    <div class="relative w-full p-5" id="controls-carousel" data-carousel="static">
        <!-- Carousel wrapper -->
        <div class="relative h-screen overflow-hidden rounded-lg md:h-96">
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img class="absolute left-1/2 top-1/2 block w-full -translate-x-1/2 -translate-y-1/2"
                    src="{{ asset('images/landing-page/3c8c0a16-c715-4958-8749-19329c222cbe.jpeg') }}" alt="...">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                <img class="absolute left-1/2 top-1/2 block w-full -translate-x-1/2 -translate-y-1/2"
                    src="{{ asset('images/landing-page/8a1c4f30-e3e1-4de1-a47e-25de8235c412.jpeg') }}" alt="...">
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img class="absolute left-1/2 top-1/2 block w-full -translate-x-1/2 -translate-y-1/2"
                    src="{{ asset('images/landing-page/a7469b2c-1f81-4e1b-956f-fdd07680a11e.jpeg') }}" alt="...">
            </div>
        </div>
        <!-- Slider controls -->
        <button
            class="group absolute start-0 top-0 z-30 flex h-full cursor-pointer items-center justify-center px-4 focus:outline-none"
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
            class="group absolute end-0 top-0 z-30 flex h-full cursor-pointer items-center justify-center px-4 focus:outline-none"
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

    <div class="container mb-4 mt-5 p-4 text-center">
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-amber-950 md:text-5xl lg:text-6xl">
            Kupon Undian Diary Fest Baubau Berjaya Bersama Ari Yasin</h1>
    </div>

    <form class="mx-auto max-w-full p-5" id="participant-form" action="{{ route('participant.store') }}" method="POST"
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
            <label class="mb-2 block text-sm font-bold text-gray-700" for="ktp_id">
                Nomor KTP :
            </label>
            <input
                class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none"
                id="ktp_id" name="ktp_id" type="number" placeholder="7571xxxxx" required>
        </div>
        <div class="mb-5">
            <label class="text-black-100 mb-2 block text-sm font-medium dark:text-black" for="address">
                Alamat : </label>
            <input
                class="bg-whiteborder block w-full rounded-lg border-white p-2.5 text-sm text-white focus:border-blue-500 focus:ring-blue-500 dark:border-white dark:bg-white dark:text-white dark:placeholder-white dark:focus:border-blue-500 dark:focus:ring-blue-500"
                id="address" name="address" type="text" placeholder="Alamat" required />
        </div>
        <div class="mb-5">
            <label class="text-black-100 mb-2 block text-sm font-medium dark:text-black" for="phone">
                No Hp : </label>
            <input
                class="bg-whiteborder block w-full rounded-lg border-white p-2.5 text-sm text-white focus:border-blue-500 focus:ring-blue-500 dark:border-white dark:bg-white dark:text-white dark:placeholder-white dark:focus:border-blue-500 dark:focus:ring-blue-500"
                id="phone" name="phone" type="text" placeholder="No Hp" required />
        </div>
        <label class="mb-2 block text-sm font-medium text-black" for="ktp_image">Upload KTP</label>
        <input
            class="mb-5 block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:outline-none dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:placeholder-gray-400"
            id="ktp_image" name="ktp_image" type="file">

        <button
            class="w-full rounded-lg bg-green-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-amber-800 focus:outline-none focus:ring-4 focus:ring-amber-300 dark:bg-amber-600 dark:hover:bg-amber-700 dark:focus:ring-amber-800 sm:w-auto"
            type="submit">Submit</button>
        <div class="mb-5 flex items-start">
            <div class="flex h-5 items-center"></div>
        </div>
    </form>

    @push('after-scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const form = document.getElementById('participant-form');

                if (form) {
                    form.addEventListener('submit', function(e) {
                        e.preventDefault(); // Mencegah submit form default

                        let formData = new FormData(form);

                        fetch(form.action, {
                                method: 'POST',
                                body: formData,
                                headers: {
                                    'X-Requested-With': 'XMLHttpRequest',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                        .getAttribute('content')
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil!',
                                        text: 'Nomor Tiket Anda: ' + data.ticket_number,
                                        timer: 3000,
                                        showConfirmButton: false
                                    });
                                    form.reset(); // Reset form jika diinginkan
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: data.error ||
                                            'Terjadi kesalahan saat mengirimkan form!',
                                    });
                                }
                            })
                            .catch(error => {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Terjadi kesalahan saat mengirimkan form!',
                                });
                            });
                    });
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
            });
        </script>
    @endpush
</x-landing-layout> --}}
