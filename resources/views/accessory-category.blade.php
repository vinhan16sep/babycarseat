@extends('layouts.app')

@section('meta_title', "Phụ Kiện")
@section('meta_keyword', "Phụ Kiện")
@section('meta_description', "Phụ Kiện")
@section('meta_image', "Phụ Kiện")

@section('content')
   <div class="bz_inner_page_navigation float_left">
      <div class="container custom_container">
            <div class="inner_menu float_left">
               <ul>
                  <li>
                        <a href="#">
                           <span><i class="fas fa-home"></i></span>
                        </a>
                  </li>
                  <li>
                        <a href="#">
                           <span><i class="fas fa-angle-right"></i></span> Phụ Kiện
                        </a>
                  </li>
               </ul>
            </div>
      </div>
   </div>

   <div class="bz_product_grid_content_main_wrapper float_left mt-10">
      <div class="container custom_container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-12">
            <div class="row">
               @foreach ($accessoryCategories as $item)
                  @php
                     $route = route("category-detail-accessory", ["category" => $item->slug]);
                  @endphp
                  @include('components.category-item', ["item" => $item, "is_new" => false])
               @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
