@if ($paginator->hasPages())
    <ul class="pagination" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="page-link" aria-hidden="true">@lang('backend/default.previous')</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}{{ (request()->by ? '&by='.request()->by:'').(request()->order ? '&order='.request()->order:'') }}" rel="prev" aria-label="@lang('pagination.previous')">@lang('backend/default.previous')</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ num2locale($element) }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active" aria-current="page"><span class="page-link">{{ num2locale($page) }}</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}{{ (request()->by ? '&by='.request()->by:'').(request()->order ? '&order='.request()->order:'') }}">{{ num2locale($page) }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}{{ (request()->by ? '&by='.request()->by:'').(request()->order ? '&order='.request()->order:'') }}" rel="next" aria-label="@lang('pagination.next')">@lang('backend/default.next')</a>
            </li>
        @else
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="page-link" aria-hidden="true">@lang('backend/default.next')</span>
            </li>
        @endif
    </ul>
@endif
