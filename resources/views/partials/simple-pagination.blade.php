@if ($paginator->hasPages())
    <nav>
        <div class="join grid grid-cols-2">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a class="join-item btn btn-disabled" aria-disabled="true"><span>@lang('pagination.previous')</span></a>
            @else
                <a class="join-item btn btn-outline" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a class="join-item btn btn-outline" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
            @else
                <a class="join-item btn btn-disabled" aria-disabled="true"><span>@lang('pagination.next')</span></a>
            @endif
        </div>
    </nav>
@endif
