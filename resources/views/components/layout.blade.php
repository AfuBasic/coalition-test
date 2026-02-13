<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ? $title . ' | ' : 'Projects | ' }} Coalition Task Manager</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 text-gray-800">
    
    {{-- Header --}}
    <header class="bg-white border-b border-b-gray-300/50 shadow-sm">
        <div class="max-w-5xl mx-auto px-6 py-4 flex items-center justify-between">
            
            <h1 class="font-semibold text-lg tracking-tight">
                Coalition Task Manager
            </h1>
            
            <nav class="flex gap-2 text-sm">
                <a
                href="{{ route('projects.index') }}"
                class="px-4 py-2 rounded-lg transition
                    {{ request()->routeIs('projects.index')
                        ? 'bg-orange-600 text-white shadow'
                        : 'text-gray-600 hover:bg-gray-100' }}">
                Projects
            </a>
            
            <a
            href="{{ route('tasks.index') }}"
            class="px-4 py-2 rounded-lg transition
                    {{ request()->routeIs('project.tasks.index')
                        ? 'bg-orange-600 text-white shadow'
                        : 'text-gray-600 hover:bg-gray-100' }}">
            Tasks
        </a>
    </nav>
    
</div>
</header>


<main class="py-10 px-4">
    <div class="max-w-3xl mx-auto">
        @if(session()->has('success'))
        <div class="mb-5">
            <x-alert type="success">{{ session('success') }}</x-alert>
        </div>
        @endif
        @if(session()->has('error'))
        <div class="mb-5">
            <x-alert type="error">{{ session('error') }}</x-alert>
        </div>
        @endif
        <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8">
            {{ $slot }}
        </div>
        
    </div>
</main>
<script>
    $(function () {
        let currentUrl = null;
        
        $('[data-confirm-url]').on('click', function (e) {
            e.preventDefault();
            currentUrl = $(this).data('confirm-url');
            const modal = $('#confirm-dialog');
            
            $("form#delete-form-confirm-dialog").attr('action', currentUrl);
            
            modal.removeClass('hidden').addClass('flex');
        });
        
        $('.cancel').on('click', function () {
            $(this).closest('#confirm-dialog')
            .addClass('hidden')
            .removeClass('flex');
        });
        
    });
</script>
</body>
</html>