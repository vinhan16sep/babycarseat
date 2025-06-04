@php
    $hotProducts = empty($hotProducts) ? \App\Models\Product::getHotProducts() : $hotProducts;
@endphp
<section class="flat-spacing bg-css topick section-one">
    <div class="container-fluid">
        <div class="heading-section text-center wow fadeInUp">
            <h3 class="heading">Hot Selling</h3>
        </div>
        @if(!empty($hotProducts))
            <div class="flat-sw-navigation wow fadeInUp" data-wow-delay="0.1s">
                <div dir="ltr" class="swiper tf-sw-latest" data-preview="5" data-tablet="3" data-mobile="1"
                     data-space-lg="0" data-space-md="30" data-space="10" data-pagination="1" data-pagination-md="1"
                     data-pagination-lg="1" data-loop="false">
                    <div class="swiper-wrapper">
                        @foreach($hotProducts as $_item)
                            <div class="swiper-slide">
                                <div class="card-product wow fadeInUp" data-wow-delay="0s">
                                    <div class="card-product-wrapper">
                                        <a href="{{ route('san-pham', ['slug' => $_item->slug]) }}" class="product-img">
                                            <img class="lazyload img-product"
                                                 data-src="{{ getImage($_item->image) }}"
                                                 src="{{ getImage($_item->image) }}" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{ getImage($_item->image) }}"
                                                 src="{{ getImage($_item->image) }}" alt="image-product">
                                        </a>
                                    </div>
                                    <div class="card-product-info">
                                        <p class="product-title">{{ str_replace("BABYRO ", "", strtoupper($_item->name)) }}</p>
                                        <!-- <p class="product-desc">{{ $_item->categoryId ? $_item->categoryId->name : '' }}</p> -->
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="sw-pagination-latest sw-dots type-circle justify-content-center"></div>
                </div>
                <div class="nav-prev-collection d-none d-lg-flex nav-sw style-line nav-sw-left"><i class="icon icon-arrLeft"></i></div>
                <div class="nav-next-collection d-none d-lg-flex nav-sw style-line nav-sw-right"><i class="icon icon-arrRight"></i></div>
            </div>
        @endif
    </div>
</section>
