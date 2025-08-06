@if ($count > 0)
    <div class="fl-sidebar-cart">
        <div class="box-order bg-surface">
            <h5 class="title">Thông tin thanh toán</h5>
{{--            <div class="subtotal text-button d-flex justify-content-between align-items-center">--}}
{{--                <span>Subtotal</span>--}}
{{--                <span class="total">-$80.00</span>--}}
{{--            </div>--}}

            {{--                            <div class="ship">--}}
            {{--                                <span class="text-button">Shipping</span>--}}
            {{--                                <div class="flex-grow-1">--}}
            {{--                                    <fieldset class="ship-item">--}}
            {{--                                        <input type="radio" name="ship-check" class="tf-check-rounded" id="free" checked>--}}
            {{--                                        <label for="free">--}}
            {{--                                            <span>Free Shipping</span>--}}
            {{--                                            <span class="price">$0.00</span>--}}
            {{--                                        </label>--}}
            {{--                                    </fieldset>--}}
            {{--                                    <fieldset class="ship-item">--}}
            {{--                                        <input type="radio" name="ship-check" class="tf-check-rounded" id="local">--}}
            {{--                                        <label for="local">--}}
            {{--                                            <span>Local:</span>--}}
            {{--                                            <span class="price">$35.00</span>--}}
            {{--                                        </label>--}}
            {{--                                    </fieldset>--}}
            {{--                                    <fieldset class="ship-item">--}}
            {{--                                        <input type="radio" name="ship-check" class="tf-check-rounded" id="rate">--}}
            {{--                                        <label for="rate">--}}
            {{--                                            <span>Flat Rate:</span>--}}
            {{--                                            <span class="price">$35.00</span>--}}
            {{--                                        </label>--}}
            {{--                                    </fieldset>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}

            <h5 class="total-order d-flex justify-content-between align-items-center">
                <span>Tổng tiền</span>
                <span class="total">{{ numberFormat($total) }}₫</span>
            </h5>
            <div class="box-progress-checkout">
                {{--                                <fieldset class="check-agree">--}}
                {{--                                    <input type="checkbox" id="check-agree" class="tf-check-rounded">--}}
                {{--                                    <label for="check-agree">--}}
                {{--                                        I agree with the <a href="term-of-use.html">terms and conditions</a>--}}
                {{--                                    </label>--}}
                {{--                                </fieldset>--}}
                <a href="{{ route('checkout') }}" class="tf-btn btn-reset">Thanh toán</a>
{{--                <p class="text-button text-center">Or continue shopping</p>--}}
            </div>
        </div>
    </div>
@endif
