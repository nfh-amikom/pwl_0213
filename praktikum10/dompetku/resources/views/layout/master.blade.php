@vite(['resources/css/app.css', 'resources/js/app.js'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DompetKu - @yield('title')</title>

    <link rel="stylesheet" href="href=" https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

    </style>
</head>

<body class="bg-gray-50 text-gray-800">
    <div class="flex h-screen">
        <aside class="w-64 bg-white border-r border-gray-200 hidden md:flex flex-col h-screen">
    <div class="p-6">
        <h1 class="text-2xl font-bold text-indigo-600 tracking-tighter">DompetKu</h1>
    </div>

    <nav class="mt-2 px-6 space-y-2 flex-1">
        <a href="{{ url('/') }}" class="block px-4 py-2.5 {{ Request::is('/') ? 'bg-indigo-50 text-indigo-700' : 'text-gray-600' }} rounded-lg font-medium hover:bg-indigo-50 transition">
            Dashboard
        </a>
        <a href="{{ url('/transaksi/create') }}" class="block px-4 py-2.5 {{ Request::is('transaksi/create') ? 'bg-indigo-50 text-indigo-700' : 'text-gray-600' }} hover:bg-gray-50 hover:text-gray-900 rounded-lg transition">
            Tambah Transaksi
        </a>
        <a href="{{ url('/laporan') }}" class="block px-4 py-2.5 {{ Request::is('laporan') ? 'bg-indigo-50 text-indigo-700' : 'text-gray-600' }} hover:bg-gray-50 hover:text-gray-900 rounded-lg transition">
            Laporan (VIP)
        </a>
    </nav>

    <div class="p-4 border-t border-gray-100">
        <div class="flex items-center p-2 mb-4">
            <div class="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 font-bold text-xs">
                AD
            </div>
            <div class="ml-3">
                <p class="text-xs font-bold text-gray-800">Admin DompetKu</p>
                <p class="text-[10px] text-gray-500">admin@dompetku.com</p>
            </div>
        </div>
        
        <a href="{{ route('logout') }}" 
           class="flex items-center w-full px-4 py-2 text-sm font-medium text-red-600 hover:bg-red-50 rounded-lg transition group">
            <svg class="w-5 h-5 mr-3 text-red-400 group-hover:text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
            </svg>
            Keluar (Logout)
        </a>
    </div>
</aside>

        <main class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white shadow-sm border-b border-gray-200 p-4
md:hidden">
                <h1 class="text-xl font-bold text-indigo-600">DompetKu</h1>
            </header>

            <div class="flex-1 overflow-auto p-4 md:p-8">
                </head>
                @if (session('success'))
                <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500
text-green-700 rounded-r shadow-sm">
                    <p class="font-bold">Berhasil!</p>
                    <p>{{ session('success') }}</p>
                </div>
                @endif
                @yield('content')
            </div>
        </main>
    </div>
</body>

</html>
