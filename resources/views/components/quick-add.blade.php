@if (!empty($product))
    @php
        $route = route("san-pham", ["slug" => $product->slug]);
    @endphp
    <div class="tf-product-info-item">
        <div class="image">
            <img src="{{ getImage($product->image_for_list['image']) }}" alt="">
        </div>
        <div class="content">
            <a href="{{ $route }}l">{{ $product->name }}</a>
            <div class="tf-product-info-price">
                <h5 class="price-on-sale font-2">
                    @if($product->is_discount)
                        {{ numberFormat($product->discount_value) }}₫
                        <span> <del>{{ numberFormat($product->price) }}₫</del> </span>
                    @else
                        {{ numberFormat($product->price) }}₫
                    @endif
                </h5>
            </div>
        </div>
    </div>
    <div class="tf-product-info-choose-option">
        <div class="variant-picker-item">
            <div class="variant-picker-label mb_12">
                Colors:<span class="text-title variant-picker-label-value value-currentColor" data-id="{{ $product->productColors[0] ? $product->productColors[0]->color->id : '' }}">{{ $product->productColors[0] ? $product->productColors[0]->color->name : '' }}
                            </span>
            </div>
            <div class="variant-picker-values">
                @foreach($product->productColors as $_color)
                    <input type="radio" name="color" value="{{ $_color->color->id }}">
                    <label class="hover-tooltip tooltip-bot radius-60 color-btn {{ $loop->index == 0 ? 'active' : '' }}"
                           for="values-beige" data-value="{{ $_color->color->name }}" data-id="{{ $_color->color->id }}" style="background-color: {{ $_color->color->code }}!important">
                        <span class="btn-checkbox"></span>
                        <span class="tooltip">{{ $_color->color->name }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <div class="tf-product-info-quantity">
            <div class="title mb_12">Quantity:</div>
            <div class="wg-quantity">
                <span class="btn-quantity btn-decrease">-</span>
                <input class="quantity-product" type="text" name="number" value="1">
                <span class="btn-quantity btn-increase">+</span>
            </div>
        </div>
        <div>
            <div class="tf-product-info-by-btn mb_10">
                <a class="btn-style-2 flex-grow-1 text-btn-uppercase fw-6 show-shopping-cart add-to-card" data-id="{{ $product->id }}"><span>Add to cart -&nbsp;</span><span
                        class="tf-qty-price total-price">
                        @if($product->is_discount)
                            {{ numberFormat($product->discount_value) }}₫
                            <span> <del>{{ numberFormat($product->price) }}₫</del> </span>
                        @else
                            {{ numberFormat($product->price) }}₫
                        @endif
                    </span></a>
            </div>
            <a href="#" class="btn-style-3 text-btn-uppercase">Buy it now</a>
        </div>
    </div>
@else
    <p>Sản phẩm không tồn tại</p>
@endif
