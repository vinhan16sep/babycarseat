@php
    $hotProducts = empty($hotProducts) ? \App\Models\Product::getHotProducts() : $hotProducts;
@endphp
<section class="flat-spacing bg-css topick">
    <div class="container">
        <div class="heading-section text-center wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
            <h3 class="heading" style="color:black;">Hot Selling Babyro</h3>
        </div>
        @if(!empty($hotProducts))
                    <div dir="ltr" class="swiper tf-sw-latest" data-preview="4" data-tablet="3" data-mobile="1"
                         data-space-lg="30" data-space-md="30"  data-space="15" data-pagination="1" data-pagination-md="1"
                         data-pagination-lg="1">
                        <div class="swiper-wrapper">
                            @foreach($hotProducts as $_item)
                                <div class="swiper-slide">
                                    <div class="card-product wow fadeInUp" data-wow-delay="0s">
                                        <div class="card-product-wrapper">
                                            <a href="{{ route('san-pham', ['category_slug' => $_item->categoryId->slug, 'slug' => $_item->slug]) }}" class="product-img">
                                                <img class="lazyload img-product"
                                                     data-src="{{ getImage($_item->image) }}"
                                                     src="{{ getImage($_item->image) }}" alt="image-product">
                                                <img class="lazyload img-hover" data-src="{{ getImage($_item->image) }}"
                                                     src="{{ getImage($_item->image) }}" alt="image-product">
                                            </a>
                                        </div>
                                        <div class="card-product-info">
                                            <p class="product-title">{{ $_item->name }}</p>
                                            <p class="product-desc">{{ $_item->categoryId ? $_item->categoryId->name : '' }}</p>
                                            {{--                                <a href="product-detail.html" class="title link">View i-Spin 360</a>--}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="sw-pagination-latest sw-dots type-circle justify-content-center"></div>
                    </div>
                @endif
    </div>
</section>
