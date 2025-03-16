<style>
    li.border_show.disabled:hover span.pagination-item{
        background-color: initial;
        border: 1px solid #e9e9e9;
        color: initial;
    }
</style>
@if ($paginator->hasPages())
    <ul class="wg-pagination justify-content-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="border_show disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="pagination-item text-button" aria-hidden="true"><i class="icon-arrLeft"></i></span>
            </li>
        @else
            <li class="border_show">
                <a class="pagination-item text-button" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="icon-arrLeft"></i></a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled" aria-disabled="true"><span class="pagination-item text-button">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active" aria-current="page"><span class="pagination-item text-button">{{ $page }}</span></li>
                    @else
                        <li><a class="pagination-item text-button" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="border_show">
                <a class="pagination-item text-button" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i class="icon-arrRight"></i></a>
            </li>
        @else
            <li class="border_show disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="pagination-item text-button" aria-hidden="true"><i class="icon-arrRight"></i></span>
            </li>
        @endif
    </ul>
@endif
