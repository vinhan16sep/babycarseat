@if ($count > 0)
    @foreach ($cart as $key => $item)
        @php
            $route = route("san-pham", ["slug" => $item->options->slug]);
        @endphp

        <div class="tf-mini-cart-item file-delete">
            <div class="tf-mini-cart-image">
                <img class="lazyload"
                     data-src="{{ getImage($item->options->image) }}"
                     src="{{ getImage($item->options->image) }}" alt="{{ $item->name }}">
            </div>
            <div class="tf-mini-cart-info flex-grow-1">
                <div
                    class="mb_12 d-flex align-items-center justify-content-between flex-wrap gap-12">
                    <div class="text-title"><a href="{{ route("san-pham", ["slug" => $item->options->slug]) }}"
                                               class="link text-line-clamp-1">{{ $item->name }}</a></div>
                    <div class="text-button tf-btn-remove remove" data-id="{{ $key }}">Remove</div>
                </div>
                <div
                    class="d-flex align-items-center justify-content-between flex-wrap gap-12">
                    <div class="text-secondary-2">{{ $item->options->color ?? '' }}</div>
                    <div class="text-button">{{ $item->qty }} x {{ numberFormat($item->price) }}₫</div>
                </div>
            </div>
        </div>
    @endforeach
@endif
