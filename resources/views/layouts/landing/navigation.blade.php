<nav class="bg-amber-700 hover:bg-amber-800">
    <div class="mx-auto flex max-w-screen-xl flex-wrap items-center justify-between p-4">
        <a class="flex items-center space-x-3 rtl:space-x-reverse" href="">
            <span class="self-center whitespace-nowrap text-3xl font-black text-white">ARI - YASIN</span>
        </a>

        <div class="flex space-x-3 rtl:space-x-reverse md:order-2 md:space-x-0">
            @if (Route::currentRouteName() == 'tickets.show')
                <a class="rounded-lg bg-white px-4 py-2 text-center text-sm font-medium text-orange-700 hover:bg-slate-400 focus:outline-none focus:ring-4 focus:ring-white dark:bg-white dark:hover:bg-white dark:focus:ring-white"
                    href="{{ route('layouts.index') }}">Kembali</a>
            @else
                <a class="rounded-lg bg-white px-4 py-2 text-center text-sm font-medium text-orange-700 hover:bg-slate-400 focus:outline-none focus:ring-4 focus:ring-white dark:bg-white dark:hover:bg-white dark:focus:ring-white"
                    href="{{ route('tickets.show') }}">Cek Tiket Anda</a>
            @endif

        </div>
    </div>
</nav>
