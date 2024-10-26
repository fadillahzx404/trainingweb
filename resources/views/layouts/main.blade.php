<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>


    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* The animation code */
        @keyframes example {
            25% {
                opacity: 10;

            }

            50% {
                opacity: 6;
            }

            75% {
                opacity: 2;
            }

            100% {
                opacity: 0;
                visibility: hidden;

            }
        }

        /* The element to apply the animation to */
        #splash-screen {
            min-width: 100%;
            min-height: 100%;
            animation-name: example;
            animation-duration: 2.2s;
            animation-fill-mode: forwards;
            animation-timing-function: ease-out;
        }
    </style>

</head>

<body class="relative">
    <div id="splash-screen" class=" z-50 bg-gradient-to-br from-blue-300 to-red-200 absolute top-0 ">
        <p class="text-center font-extrabold text-4xl animate__animated animate__fadeInUp  fixed top-1/2 right-1/2">
            Welcome to</p>
        <p
            class="text-center pr-16 font-extrabold text-4xl animate__animated animate__fadeInDown fixed top-1/2 right-1/4">
            Training Web
            Apps</p>
    </div>


    <aside id="sidebar"
        class="sidebar w-64 fixed top-0 left-0 z-40 h-screen transition-transform -translate-x-full sm:translate-x-0 border-r-2 border-gray-200 "
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">

            <div class="flex justify-center">
                <a href="https://flowbite.com/" class="p-2 flex  items-center ps-2.5 mb-5">
                    <svg id="logo-14" width="73" height="49" viewBox="0 0 73 49" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M46.8676 24C46.8676 36.4264 36.794 46.5 24.3676 46.5C11.9413 46.5 1.86765 36.4264 1.86765 24C1.86765 11.5736 11.9413 1.5 24.3676 1.5C36.794 1.5 46.8676 11.5736 46.8676 24Z"
                            class="ccustom" fill="#68DBFF"></path>
                        <path
                            d="M71.1324 24C71.1324 36.4264 61.1574 46.5 48.8529 46.5C36.5484 46.5 26.5735 36.4264 26.5735 24C26.5735 11.5736 36.5484 1.5 48.8529 1.5C61.1574 1.5 71.1324 11.5736 71.1324 24Z"
                            class="ccompli1" fill="#FF7917"></path>
                        <path
                            d="M36.6705 42.8416C42.8109 38.8239 46.8676 31.8858 46.8676 24C46.8676 16.1144 42.8109 9.17614 36.6705 5.15854C30.5904 9.17614 26.5735 16.1144 26.5735 24C26.5735 31.8858 30.5904 38.8239 36.6705 42.8416Z"
                            class="ccompli2" fill="#5D2C02"></path>
                    </svg>
                    <span
                        class="text-xl pl-2 font-semibold whitespace-nowrap dark:text-white title-menu w-full">Moonton</span>
                </a>
            </div>

            @include('includes.sidebar')
        </div>
    </aside>


    <div class="ml-64 grow" id="content">
        <div class="p-4 flex justify-between sticky top-0 place-items-center shadow-md bg-white opacity-90">
            <div class="flex gap-4 place-items-center">
                <button class="btn btn-sm" id="sidebarResize"><i class="fa-solid fa-chevron-left"></i></button>
                <p class="font-bold">@yield('title')</p>
            </div>
            <div class="grid text-end">
                <p>Fadillah Wahyu Heryanto</p>
                <p class="text-sm font-bold">Admin</p>
            </div>
        </div>
        <div class="min-h-screen">
            <div class="p-4 mx-4 mt-8">
                @yield('page-content')
            </div>
        </div>
    </div>


    {{-- Script --}}
    @stack('prepend-script')
    @include('includes.script')
    @stack('addon-script')
</body>

</html>
