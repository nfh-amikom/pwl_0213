@vite(['resources/css/app.css', 'resources/js/app.js'])

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="href=" https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap">

    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8">
        <h1 class="text-xl py-4 font-bold text-center text-indigo-600">DompetKu</h1>
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Masuk</h2>
        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4 text-sm">
                {{ session('error') }}
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    value="{{ old('email') }}" 
                    required 
                    autofocus
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror"
                    placeholder="nama@email.com"
                >
                @error('email')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    required 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('password') border-red-500 @enderror"
                    placeholder="********"
                >
                @error('password')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <button 
                type="submit" 
                class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition duration-200"
            >
                Login
            </button>

            <div class="mt-4 text-center">
                <a href="#" class="text-sm text-blue-500 hover:underline">Lupa password?</a>
            </div>
        </form>
    </div>

</body>
</html>