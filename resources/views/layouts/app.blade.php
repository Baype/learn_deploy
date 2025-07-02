<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Dashboard')</title>

    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@2.3.0/dist/flowbite.min.js"></script>
</head>

<body class="bg-gray-100">

    {{-- Sidebar Toggle Button (Visible on Mobile) --}}
    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
        type="button"
        class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z" />
        </svg>
    </button>

    {{-- Sidebar --}}
    <aside id="default-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                @auth
                    <li class="mb-4">
                        <div class="flex items-center gap-3 p-2 text-gray-900 rounded-lg dark:text-white">
                            <img src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}"
                                alt="User Photo"
                                class="w-10 h-10 rounded-full object-cover border border-gray-300 dark:border-gray-600" />
                            <div>
                                <div class="font-semibold">{{ Auth::user()->name }}</div>
                            </div>

                            <form method="POST" action="{{ route('logout') }}" class="ml-4">
                                @csrf
                                <button type="submit"
                                    class="flex items-center w-full p-2 text-left text-red-600 rounded-lg hover:bg-red-50 dark:hover:bg-red-900 dark:text-red-400 group transition-colors">
                                    <svg class="w-5 h-5 me-3 text-red-500 group-hover:text-red-700 dark:text-red-300 dark:group-hover:text-white"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1" />
                                    </svg>
                                    <span class="font-medium">Keluar</span>
                                </button>
                            </form>
                        </div>
                    </li>
                @endauth

                {{-- MASTER SECTION --}}
                <li class="text-xs font-semibold text-gray-500 uppercase dark:text-gray-400 px-2">Master Data</li>

                {{-- PASIEN --}}
                <li>
                    <a href="{{ route('pasien.index') }}"
                        class="flex items-center p-2 rounded-lg group
            {{ request()->is('pasien*') ? 'bg-blue-600 text-white' : 'text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }}">
                        {{-- Icon --}}
                        <svg class="w-5 h-5 me-3 {{ request()->is('pasien*') ? 'text-white' : 'text-gray-500 group-hover:text-blue-600 dark:text-gray-400 dark:group-hover:text-white' }}"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5.121 17.804A11.955 11.955 0 0112 15c2.21 0 4.274.63 6.001 1.708M15 11a3 3 0 11-6 0 3 3 0 016 0zM19 21v-2a4 4 0 00-4-4H9a4 4 0 00-4 4v2" />
                        </svg>
                        <span>Pasien Master</span>
                    </a>
                </li>

                {{-- SIGNA --}}
                <li>
                    <a href="{{ route('signa.index') }}"
                        class="flex items-center p-2 rounded-lg group
            {{ request()->is('signa*') ? 'bg-blue-600 text-white' : 'text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }}">
                        <svg class="w-5 h-5 me-3 {{ request()->is('signa*') ? 'text-white' : 'text-gray-500 group-hover:text-blue-600 dark:text-gray-400 dark:group-hover:text-white' }}"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6l4 2m6-2a10 10 0 11-20 0 10 10 0 0120 0z" />
                        </svg>
                        <span>Signa Master</span>
                    </a>
                </li>

                {{-- OBAT --}}
                <li>
                    <a href="{{ route('obat.index') }}"
                        class="flex items-center p-2 rounded-lg group
              {{ request()->is('obat*') ? 'bg-blue-600 text-white' : 'text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            class="w-5 h-5 me-3
                   {{ request()->is('obat*') ? 'text-white' : 'text-gray-500 group-hover:text-blue-600 dark:text-gray-400 dark:group-hover:text-white' }}"
                            viewBox="0 0 512 512">
                            <path
                                d="M184.8 327.2 327.2 184.8c18.8 26.8 36.1 66.9 10.5 111.1-3.2 5.7-7.1 11.2-11.5 16.2s-9.4 9.7-14.9 13.8c-45.3 34.7-87.2 16.4-126.5 1.3zm22.6-177.4c8.2-8.2 21.4-8.2 29.6 0l125.3 125.3c8.2 8.2 8.2 21.4 0 29.6L237 429.8c-8.2 8.2-21.4 8.2-29.6 0L82.1 304.5c-8.2-8.2-8.2-21.4 0-29.6L207.4 149.8zM275.4 104.3l22.6-22.6C342.6 37.1 405.9 27.4 447 68.5s31.3 104.4-13.2 149l-22.6 22.6-135.8-135.8z" />
                        </svg>
                        <span>Master Obat</span>
                    </a>
                </li>

                {{-- TRANSAKSI SECTION --}}
                <li class="text-xs font-semibold text-gray-500 uppercase dark:text-gray-400 mt-4 px-2">Transaksi</li>

                {{-- RACIK --}}
                <li>
                    <a href="{{ route('racik.index') }}"
                        class="flex items-center p-2 rounded-lg group
            {{ request()->is('racik*') ? 'bg-blue-600 text-white' : 'text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }}">
                        <svg class="w-5 h-5 me-3 {{ request()->is('racik*') ? 'text-white' : 'text-gray-500 group-hover:text-blue-600 dark:text-gray-400 dark:group-hover:text-white' }}"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M5 20h14v-2H5v2zm7-18C7.48 2 3 6.48 3 12c0 2.08.8 3.97 2.1 5.41l1.45-1.32A6.985 6.985 0 015 12c0-3.87 3.13-7 7-7s7 3.13 7 7c0 1.61-.55 3.09-1.47 4.28l1.45 1.32A8.942 8.942 0 0021 12c0-5.52-4.48-10-10-10z" />
                        </svg>
                        <span>Racik</span>
                    </a>
                </li>
            </ul>



        </div>
    </aside>

    {{-- Main Content --}}
    <main class="ml-0 sm:ml-64 p-6 min-h-screen">
        @yield('content')
    </main>

</body>

</html>
