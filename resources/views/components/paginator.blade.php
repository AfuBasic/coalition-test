@if ($paginator->hasPages())
    <nav {{ $attributes->merge(['class' => 'flex items-center justify-center mt-6 text-sm']) }}>
        <div class="flex items-center gap-1">
            @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
                @if ($page === $paginator->currentPage())
                    <span class="px-3 py-1 bg-orange-600 text-white rounded-lg">
                        {{ $page }}
                    </span>
                @else
                    <a href="{{ $url }}"
                       class="px-3 py-1 border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                        {{ $page }}
                    </a>
                @endif
            @endforeach
        </div>
    </nav>
@endif