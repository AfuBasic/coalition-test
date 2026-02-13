<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Error' }}</title>
    @vite(['resources/css/app.css'])
</head>

<body class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 flex items-center justify-center px-6">

    <div class="max-w-md w-full text-center p-10">

        <h1 class="text-6xl font-bold text-gray-900 mb-2">
            {{ $code }}
        </h1>

        <h2 class="text-xl font-semibold text-gray-700 mb-3">
            {{ $title }}
        </h2>

        <p class="text-gray-500 mb-6">
            {{ $message }}
        </p>

        <a href="{{ url('/') }}"
           class="inline-block px-5 py-2.5 bg-orange-600 text-white rounded-lg
                  hover:bg-orange-700 transition shadow-sm">
            Go Home
        </a>

    </div>

</body>
</html>