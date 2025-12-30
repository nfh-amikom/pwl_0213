@if ($paginator->hasPages())
<nav class="flex items-center justify-between">

    {{-- Info --}}
    <div>
        <p class="text-sm text-gray-600">
            Showing
            <span class="font-medium">{{ $paginator->firstItem() }}</span>
            to
            <span class="font-medium">{{ $paginator->lastItem() }}</span>
            of
            <span class="font-medium">{{ $paginator->total() }}</span>
            results
        </p>
    </div>

    {{-- Pagination --}}
    <div>
        <span class="inline-flex rounded-md shadow-sm">

            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <span class="px-3 py-2 text-sm text-gray-400 bg-white border border-gray-300 rounded-l-md cursor-not-allowed">
                    ‹
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                   class="px-3 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-l-md hover:bg-gray-100">
                    ‹
                </a>
            @endif

            {{-- Pages --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="px-3 py-2 text-sm text-gray-500 bg-white border border-gray-300">
                        {{ $element }}
                    </span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="px-3 py-2 text-sm font-semibold text-indigo-600 bg-white border border-indigo-500">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}"
                               class="px-3 py-2 text-sm text-gray-700 bg-white border border-gray-300 hover:bg-gray-100">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                   class="px-3 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-r-md hover:bg-gray-100">
                    ›
                </a>
            @else
                <span class="px-3 py-2 text-sm text-gray-400 bg-white border border-gray-300 rounded-r-md cursor-not-allowed">
                    ›
                </span>
            @endif

        </span>
    </div>
</nav>
@endif
