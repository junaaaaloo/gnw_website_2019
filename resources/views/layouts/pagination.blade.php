<div class="ui pagination menu">
    @if ($paginator->onFirstPage())
    <a class="icon item disabled">
        <i class="icon angle left"> </i>&nbsp
        <span class="mobile">Previous</span>
    </a>
    @else
    <a href="{{ $paginator->previousPageUrl() }}" class="icon item">
        <i class="icon angle left"> </i>&nbsp
        <span class="mobile">Previous</span>
    </a>
    @endif

    <!-- Pagination Elements -->
    @foreach ($elements as $element)
        <!-- "Three Dots" Separator -->
        @if (is_string($element))
        <a class="icon desktop disabled item">
        {{ $element }}
        </a>
        @endif

        <!-- Array Of Links -->
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                <a class="active desktop item">
                {{ $page }}
                </a>
                @else
                <a href="{{ $url }}" class="desktop item">
                {{ $page }}
                </a>
                @endif
            @endforeach
        @endif
    @endforeach

    <!-- Next Page Link -->
    @if ($paginator->hasMorePages())
    <a href="{{ $paginator->nextPageUrl() }}" class="icon item">
        <span class="mobile">Next</span>&nbsp
        <i class="icon angle right"> </i>
    </a>
    @else
    <a class="icon item disabled">
        <span class="mobile">Next</span>&nbsp
        <i class="icon angle right"> </i>
    </a>
    @endif
</div>