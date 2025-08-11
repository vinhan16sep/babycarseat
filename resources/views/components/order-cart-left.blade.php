@if ($count > 0)
    <form class="box-body-cart">
        <table class="tf-table-page-cart">
            <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng tiền</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($cart as $key => $item)
                <tr class="tf-cart-item file-delete">
                    <td class="tf-cart-item_product">
                        <a class="img-box">
                            @if (!empty($item->options["image"]))
                                <img  class="img-fluid cart" src="{{ getImage($item->options["image"]) }}" alt="{{ $item->name }}">
                            @endif
                        </a>
                        <div class="cart-info">
                            <a class="cart-title link">{{ $item->name }}</a>
                            @if(!empty($item->options['colors']))
                                <div class="variant-box">
                                    <div class="tf-select">
                                        <select data-id="{{ $key }}" class="update-color-item">
                                            @foreach($item->options['colors'] as $color_id => $color_name)
                                                <option value="{{ $color_id }}" {{ isset($item->options['product_color_id']) && $item->options['product_color_id'] == $color_id ? 'selected="selected"' : '' }}>{{ $color_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </td>
                    <td data-cart-title="Price" class="tf-cart-item_price text-center">
                        <div class="cart-price text-button price-on-sale">{{ numberFormat($item->price) }}₫</div>
                    </td>
                    <td data-cart-title="Quantity" class="tf-cart-item_quantity">
                        <div class="wg-quantity mx-md-auto">
                            <span class="btn-quantity btn-decrease">-</span>
                            <input type="text" class="quantity-product qty-product" min="1" data-old-value="{{ $item->qty }}" value="{{ $item->qty }}" data-id="{{ $key }}">
                            <span class="btn-quantity btn-increase">+</span>
                        </div>
                    </td>
                    <td data-cart-title="Total" class="tf-cart-item_total text-center">
                        <div class="cart-total text-button total-price">{{ numberFormat($item->price*$item->qty) }}₫</div>
                    </td>
                    <td data-cart-title="Remove" class="remove-cart" data-id="{{ $key }}"><span class="remove icon icon-close"></span></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </form>
@else
    <p class="zoom-area">Không có sản phẩm nào trong giỏ hàng</p>
{{--    <a class="back-to-home" href="{{ route("home") }}">Quay lại trang chủ</a>--}}
@endif
