<style>
    .widget-facet .facet-color-box .color-item.not-active:hover{
        border-color: #181818;
    }
    .widget-facet .facet-color-box .color-item.not-active{
        border-color: #e9e9e9;
    }
</style>
<div class="sidebar-filter canvas-filter left">
    <form id="form-filter" action="{{ !empty($category) ? route('product-list', ['category_slug' => $category->slug ]) : route('product-list') }}">
        <input type="hidden" name="orderBy" value="{{ request('orderBy', 'date') }}" />
        <div class="canvas-wrapper">
            <div class="canvas-header d-flex d-xl-none">
                <h5>Tìm kiếm</h5>
                <span class="icon-close close-filter"></span>
            </div>
            <div class="canvas-body">

                <div class="widget-facet facet-categories">
                    <h6 class="facet-title">Danh mục sản phẩm</h6>
                    <ul class="facet-content">
                        @foreach($categories as $_category)
                            <li><a href="{{ route('product-list', ['category_slug' => $_category->slug]) }}" class="categories-item {{ !empty($category) && $category->slug == $_category->slug ? 'active' : '' }}">{{ $_category->name }} <span class="count-cate">({{ $_category->products_count }})</span></a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="widget-facet facet-price">
                    <h6 class="facet-title">Price</h6>
                    <div class="price-val-range" id="price-value-range" data-min="0" data-max="{{ $product_price_max }}"></div>
                    <div class="box-price-product">
                        <div class="box-price-item">
                            <span class="title-price">Min price</span>
                            <div class="price-val" id="price-min-value" data-currency="$"></div>
                        </div>
                        <div class="box-price-item">
                            <span class="title-price">Max price</span>
                            <div class="price-val" id="price-max-value" data-currency="$"></div>
                        </div>
                    </div>
                </div>

    {{--            <div class="widget-facet facet-size">--}}
    {{--                <h6 class="facet-title">Size</h6>--}}
    {{--                <div class="facet-size-box size-box">--}}
    {{--                    <span class="size-item size-check">XS</span>--}}
    {{--                    <span class="size-item size-check">S</span>--}}
    {{--                    <span class="size-item size-check">M</span>--}}
    {{--                    <span class="size-item size-check">L</span>--}}
    {{--                    <span class="size-item size-check">XL</span>--}}
    {{--                    <span class="size-item size-check">2XL</span>--}}
    {{--                    <span class="size-item size-check">3XL</span>--}}
    {{--                    <span class="size-item size-check free-size">Free Size</span>--}}
    {{--                </div>--}}
    {{--            </div>--}}

                <div class="widget-facet facet-color">
                    <h6 class="facet-title">Colors</h6>
                    <div class="facet-color-box">
                        @foreach($colors as $color)
                            <div class="color-item color-check {{ request('color') === (string)$color->id ? 'active' : '' }}">
                                <span class="color" style="background-color: {{ $color->code }}!important" data-id="{{ $color->id }}"></span>{{ $color->name }}
                                <input style="display: none" type="radio" name="color" value="{{ $color->id }}" {{ request('color') === (string)$color->id ? 'checked' : '' }} >
                            </div>
                        @endforeach
                    </div>
                </div>

    {{--            <div class="widget-facet facet-fieldset">--}}
    {{--                <h6 class="facet-title">Availability</h6>--}}
    {{--                <div class="box-fieldset-item">--}}
    {{--                    <fieldset class="fieldset-item">--}}
    {{--                        <input type="radio" name="availability" class="tf-check" id="inStock">--}}
    {{--                        <label for="inStock">In stock <span class="count-stock">(32)</span></label>--}}
    {{--                    </fieldset>--}}
    {{--                    <fieldset class="fieldset-item">--}}
    {{--                        <input type="radio" name="availability" class="tf-check" id="outStock">--}}
    {{--                        <label for="outStock">Out of stock <span class="count-stock">(2)</span></label>--}}
    {{--                    </fieldset>--}}
    {{--                </div>--}}
    {{--            </div>--}}

                <div class="widget-facet facet-fieldset">
                    <h6 class="facet-title">Brands</h6>
                    <div class="box-fieldset-item">
                        @foreach($brands as $brand)
                            <fieldset class="fieldset-item">
                                <input type="checkbox" name="brand[]" value="{{ $brand->id }}" {{ in_array($brand->id, (array)request('brand', [])) ? 'checked' : '' }} class="tf-check" id="brand-{{ $brand->id }}">
                                <label for="brand-{{ $brand->id }}">{{ $brand->name }} <span class="count-brand">({{ $brand->products_count }})</span></label>
                            </fieldset>
                        @endforeach
                    </div>
                </div>
                <div class="widget-facet facet-fieldset" style="text-align: center">
                    <button style="display: inline-block" type="submit">Tìm kiếm</button>
                </div>
            </div>
            <div class="canvas-bottom d-block d-xl-none">
                <button id="reset-filter" class="tf-btn btn-reset">Reset Filters</button>
            </div>
        </div>
    </form>
</div>
