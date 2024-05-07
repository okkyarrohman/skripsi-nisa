<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'E-Study') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    @vite('resources/css/app.css')
</head>

<header>
    <nav class="flex items-center justify-between flex-wrap w-full p-6">
        <div class="flex items-center flex-shrink-0 text-white mr-6">
            <svg class="fill-current h-8 w-8 mr-2" width="54" height="54" viewBox="0 0 54 54"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z" />
            </svg>
            <img src="{{ asset('assets/image/logo-nisa.jpg') }}" class="w-auto h-16" alt="Logo">
        </div>
        <div class="block lg:hidden">
            <button
                class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                </svg>
            </button>
        </div>
        <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
            <div class="text-sm lg:flex-grow">
                <!-- <a href="#responsive-header"
                    class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                    Docs
                </a>
                <a href="#responsive-header"
                    class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                    Examples
                </a>
                <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white">
                    Blog
                </a> -->
            </div>

            <div>
                <a href="/"
                    class="inline-block text-lg font-semibold px-4 py-2 mx-3 leading-none border rounded-2xl border-transparent text-[#055EA8] hover:border-[#215784] hover:border-x-transparent hover:border-t-transparent mt-4 lg:mt-0">Beranda</a>
            </div>
            @auth
                <div>
                    <a href="{{ route('home') }}"
                        class="inline-block text-lg font-semibold px-4 py-2 mx-3 leading-none border rounded-2xl text-[#055EA8] border-[#215784] hover:border-transparent hover:text-white hover:bg-[#215784] mt-4 lg:mt-0">Dashboard</a>
                </div>
            @else
                <div>
                    <a href="{{ route('login') }}"
                        class="inline-block text-lg font-semibold px-4 py-2 mx-3 leading-none border rounded-2xl text-[#055EA8] border-[#215784] hover:border-transparent hover:text-white hover:bg-[#215784] mt-4 lg:mt-0">Login</a>
                </div>
                <div>
                    <a href="{{ route('register') }}"
                        class="inline-block text-lg font-semibold px-4 py-2 mx-3 leading-none border rounded-2xl text-white bg-[#215784] hover:border-transparent hover:text-[#055EA8] hover:bg-white mt-4 lg:mt-0">Register</a>
                </div>
            @endauth

        </div>
    </nav>
</header>

<body>
    <div class="mt-10 mx-12">
        <div class="flex h-[500px] ">
            <div class="flex flex-col justify-center gap-3 ml-2">
                <h1 class="text-5xl font-bold ">Kembangkan Potensi,</h1>
                <h1 class="text-5xl font-bold "> Kerjakan Tugasmu Di sini!</h1>
                <p class="text-base text-[#83858A] my-5">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut
                    odit aut fugit, sed quia
                    consequuntur ma</p>
                <h3 class="text-2xl font-semibold">Daftar Sekarang dan Mulai Belajar Hari Ini!</h3>
                <div class="flex border-2 shadow-lg rounded-3xl px-6 items-center justify-center py-3 ml-3 w-[60%]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                        <path fill="currentColor"
                            d="m479.6 399.716l-81.084-81.084l-62.368-25.767A175.014 175.014 0 0 0 368 192c0-97.047-78.953-176-176-176S16 94.953 16 192s78.953 176 176 176a175.034 175.034 0 0 0 101.619-32.377l25.7 62.2l81.081 81.088a56 56 0 1 0 79.2-79.195M48 192c0-79.4 64.6-144 144-144s144 64.6 144 144s-64.6 144-144 144S48 271.4 48 192m408.971 264.284a24.028 24.028 0 0 1-33.942 0l-76.572-76.572l-23.894-57.835l57.837 23.894l76.573 76.572a24.028 24.028 0 0 1-.002 33.941" />
                    </svg>
                    <form action="" class="w-full">
                        <input
                            class="appearance-none w-full py-2 px-3 text-gray-700 rounded-3xl leading-tight focus:outline-none focus:shadow-outline"
                            id="search" type="search" placeholder="Cari Materi">
                    </form>
                    <button
                        class="bg-[#215784] hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="button">
                        Cari
                    </button>
                </div>
            </div>
            <div>
                <img src="assets/image/1.jpg" alt="gambar" />
            </div>
        </div>
        <div class="flex items-center justify-center mx-10 mb-16 h-[300px] gap-8">
            <div class="w-[35%]">
                <img src="assets/image/2.png" alt="">
            </div>
            <div class="flex flex-col w-[50%] gap-4">
                <h1 class="text-xl font-bold">Buat Akun Sekarang!</h1>
                <p class="text-[#83858A] text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore </p>
                <button
                    class="bg-[#215784] w-1/4 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="button">
                    Register
                </button>
            </div>
        </div>
        <div class="flex flex-col justify-center items-center w-full mb-20">
            <div class="flex flex-col items-center gap-2 mb-8">
                <h1 class="text-2xl font-bold">Galeri Interaktif</h1>
                <p class="text-[#64666C]">Temukan konten interaktif pada Galeri Interaktif</p>
            </div>
            <div>
                <div class="carousel gap-10">
                    <div class="carousel-item">
                        <img src="assets/image/3.png" class="rounded-3xl" alt="Burger" />
                    </div>
                    <div class="carousel-item">
                        <img src="assets/image/4.png" class="rounded-3xl" alt="Burger" />
                    </div>
                    <div class="carousel-item">
                        <img src="assets/image/3.png" class="rounded-3xl" alt="Burger" />
                    </div>
                    <div class="carousel-item">
                        <img src="assets/image/4.png" class="rounded-3xl" alt="Burger" />
                    </div>
                    <div class="carousel-item">
                        <img src="assets/image/3.png" class="rounded-3xl" alt="Burger" />
                    </div>
                    <div class="carousel-item">
                        <img src="assets/image/4.png" class="rounded-3xl" alt="Burger" />
                    </div>
                </div>
            </div>
            <div>
                <button
                    class="bg-[#215784] mt-6 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Lihat
                    Galeri Lainnya</button>
            </div>
        </div>
    </div>
</body>

</html>
