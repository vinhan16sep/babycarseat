@php
    if (isset($is_combo)) {
        $route = route("detail-combo", ["slug" => $product->slug]);
    } elseif (isset($is_accessory)) {
        $route = route("detail-accessory", ["slug" => $product->slug, "category" => $product->category->slug ]);
    } else {
        $route = route("san-pham", ["slug" => $product->slug]);
    }
@endphp
<div class="product_box">
    <div class="product-custom" style="border-radius: 5px 5px 0 0;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
        <div class="product_img">
            <img class="img-fluid" src="{{ getImage($product->image) }}" alt="{{ $product->name }}">
            <div class="top_icon">
                @if($product->is_new)
                    <p class="new">new</p>
                @endif
                @if($product->is_highlight)
                    <p>Hot</p>
                @endif
            </div>
            <a href="{{ $route }}">
                <div class="product_overlay"></div>
            </a>
        </div>
        @if (!isset($is_combo) && !isset($is_accessory))
            <span class="info"><i class="fa fa-info-circle" aria-hidden="true"></i></span>
            <div class="attribute">
                <p>
                    <img class="img-icon" src="/icon/pa_giong-nho.svg" alt="Giống nho">
                    <span>{{ $product->grape->name }}</span>
                </p>
                <p>
                    <img class="img-icon" src="/icon/pa_loai-vang.svg" alt="Loại vang">
                    <span>{{ $product->type->name }}</span>
                </p>
                <p>
                    <img class="img-icon" src="/icon/pa_quoc-gia.svg" alt="Quốc gia">
                    <span>{{ $product->country->name }}</span>
                </p>
                <p>
                    <img class="img-icon" src="/icon/pa_vung-trong-nho.svg" alt="Vùng trồng nho">
                    <span>{{ $product->region->name }}</span>
                </p>
                @if($product->alcohol)
                    <p>
                        <img class="img-icon" src="/icon/pa_nong-do.svg" alt="Nồng độ">
                        <span>{{ $product->alcohol }}</span>
                    </p>
                @endif
                @if($product->capacity)
                    <p>
                        <img class="img-icon icon-dung-tich" src="/icon/pa_dung-tich.svg" alt="Dung tích">
                        <span>{{ $product->capacity }}</span>
                    </p>
                @endif
            </div>
        @endif
    </div>
    <div class="product_content" style="border-radius: 0 0 5px 5px;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
        <a href="{{ $route }}">
            <h3 class="woocommerce-loop-product__title" title="{{ $product->name }}">{{ $product->name }}</h3>
        </a>
        <h4>
            @if($product->is_discount)
                {{ numberFormat($product->discount_value) }}₫
                <span> <del>{{ numberFormat($product->price) }}₫</del> </span>
            @else
                {{ numberFormat($product->price) }}₫
            @endif
        </h4>
        @if (!isset($is_accessory))
            <a href="javascript:void(0)" class="btn btn-default buy_now add-to-cart" data-qty="1" data-id="{{ $product->id }}" data-type="{{ isset($is_combo) ? "combo" : "product" }}">Mua ngay</a>
        @endif
    </div>
</div>

