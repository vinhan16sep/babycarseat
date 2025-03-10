@extends('layouts.app')

@section('meta_title', "Tin tức")
@section('meta_keyword', "Tin tức")
@section('meta_description', "Tin tức")
@section('meta_image', "Tin tức")

@section('content')

  <div class="bz_inner_page_navigation float_left">
    <div class="container">
      <div class="inner_menu float_left">
        <ul>
          <li>
            <a href="#">
              <span>
                <i class="fas fa-home"></i>
              </span>
            </a>
          </li>
          <li>
            <a href="#">
              <span>
                <i class="fas fa-angle-right"></i>
              </span> Tin tức </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="bz_product_grid_content_main_wrapper float_left">
    <div class="container custom_container">
      <div class="row">
        <div class="col-lg-3 col-md-3 col-12 order-sm-9 order-xs-9 order-12 order-lg-0 order-md-0">
          <div class="checkout_form float_left">
            <div class="accordion" id="accordionExample">
              <div class="accordian_first_wrapper float_left">
                <div class="card checkout_accord">
                  <div class="card-header accord_header" id="headingOne">
                    <h2 class="mb-0"> Tìm kiếm tin tức </h2>
                  </div>
                  <div class="card-body accord_body">
                    <div class="search_blog">
                      <form>
                        <input type="text" name="keyword" placeholder="Từ khóa tìm kiếm" value="{{ $keywork }}">
                        <button>
                          <i class="fa fa-search"></i>
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

              <div class="accordian_first_wrapper float_left  d-none">
                <div class="card checkout_accord">
                  <div class="card-header accord_header" id="headingTwo">
                    <h2 class="mb-0"> Categories </h2>
                  </div>
                  <div class="card-body accord_body">
                    <div class="categories_blog">
                      <ul>
                        <li>
                          <i class="fa fa-caret-right"></i>
                          <a href="#">Red Wine</a>
                          <span>[245]</span>
                        </li>
                        <li>
                          <i class="fa fa-caret-right"></i>
                          <a href="#">Event Wine</a>
                          <span>[142]</span>
                        </li>
                        <li>
                          <i class="fa fa-caret-right"></i>
                          <a href="#">Vine Yard</a>
                          <span>[654]</span>
                        </li>
                        <li>
                          <i class="fa fa-caret-right"></i>
                          <a href="#">Wine Gold</a>
                          <span>[50]</span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>

              <div class="accordian_first_wrapper float_left">
                <div class="card checkout_accord">
                  <div class="card-header accord_header" id="headingThree">
                    <h2 class="mb-0"> Tin tức mới nhất </h2>
                  </div>
                  <div class="card-body accord_body">
                    @foreach ($latestNews as $item)
                      <div class="blog_post float_left">
                        <div class="post_img">
                          <img class="img-fluid" src="{{ getImage($item->image) }}" alt="{{ $item->title }}">
                        </div>
                        <div class="post_cont">
                          <h4 class="content-title">
                            <a href="{{ route("detail-new", ["slug" => $item->slug ]) }}">{{ $item->title }}</a>
                          </h4>
                          <p>{{ $item->updated_at->format("d/m/Y") }}</p>
                        </div>
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
              
              <div class="accordian_first_wrapper float_left">
                <div class="card checkout_accord">
                  <div class="card-header accord_header" id="headingFive">
                    <h2 class="mb-0"> Sản phẩm mới nhất </h2>
                  </div>
                  <div class="card-body accord_body">
                    @foreach ($latestProducts as $product)
                      <div class="latest_prod float_left">
                        <div class="latest_img">
                          <img class="img-fluid" src="{{ getImage($product->image) }}" alt="{{ $product->name }}">
                        </div>
                        <div class="latest_cont">
                          <h4 class="content-title">
                            <a href="{{ route("san-pham", ["slug" => $product->slug]);}}">{{ $product->name }}</a>
                          </h4>
                          <p>
                            @if($product->is_discount)
                                {{ numberFormat($product->discount_value) }}₫
                                <span> <del>{{ numberFormat($product->price) }}₫</del> </span>
                            @else
                                {{ numberFormat($product->price) }}₫
                            @endif
                          </p>
                        </div>
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
        <div class="col-lg-9 col-md-9 col-12">
          <div class="row">

            @foreach ($news as $item)
              @php
                $route = route("detail-new", ["slug" => $item->slug ])
              @endphp
              @include('components.new-item', ["item" => $item, "route" => $route])
            @endforeach

            <div class="page_pagination">
                {!! $news->onEachSide(0)->links("simple-bootstrap-4") !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
