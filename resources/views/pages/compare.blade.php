@extends('layouts.master')

@section('title', "So sánh")

@section('content')

  <section class="bread-crumb">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home_page') }}">{{ __('Trang Chủ') }}</a></li>
        <li class="breadcrumb-item">So sánh</li>
        <li class="breadcrumb-item">{{ $data['product']->name."-".$data['productCompare']->name}}</li>
        {{-- <li class="breadcrumb-item active" aria-current="page">{{ $data['product']->name }}</li> --}}
      </ol>
    </nav>
  </section>

    <section class="section-product">
      <div class="section-header" style="text-align: center; background: #009a82">
        <h2 class="section-title" style="color: #fff">THÔNG TIN CHUNG</h2>

      </div>
      <div class="section-content">
        <div class="content-compare">
            <div class="left-compare">
                <h2 class="section-title" style="text-align: center;">{{$data['product']->name}}</h2>
                @if($data['product']->product_introduction)
                {!! $data['product']->information_details !!}
              @else
                <p class="text-center"><strong>Đang cập nhật ...</strong></p>
              @endif   
            </div>
            <div class="right-compare">
                <h2 class="section-title" style="text-align: center;">{{$data['productCompare']->name}}</h2>
            @if($data['productCompare']->product_introduction)
                {!! $data['productCompare']->information_details !!}
              @else
                <p class="text-center"><strong>Đang cập nhật ...</strong></p>
              @endif   
            </div>
        </div>
      
      </div>
 
    </section>
  
  </div>
  <!-- Modal -->

@endsection

@section('css')
  <link type="text/css" rel="stylesheet" href="{{ asset('common/lightGallery/dist/css/lightgallery.css') }}" />
  <link type="text/css" rel="stylesheet" href="{{ asset('common/lightslider/dist/css/lightslider.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/product.css') }}">
  <style>
    .content-compare{
        display: flex;
    }
    .info-compare{
      margin: 10px 0;
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .button-compare{
      padding: 5px 15px;
    border-radius: 6px;
      background: #009981;
    color: #fff;
    text-shadow: none;
    border: none;
    float: right;
    font-size: 15px;
    line-height: 20px;
    font-weight: 600;
    }
    .button-compare span{
      margin-left: 5px;
      color: #fff;
    }
    .button-compare i{
      color: #fff;
    }
  </style>
@endsection

@section('js')
  <script src="{{ asset('common/Rate/rater.js') }}"></script>
  <script src="{{ asset('common/lightGallery/dist/js/lightgallery.js') }}"></script>
  <script src="{{ asset('common/lightslider/dist/js/lightslider.js') }}"></script>
  <script src="{{ asset('js/product.js') }}"></script>
  <script>
     $(document).ready(function() {

      $(".section-rating .rating-form form").submit( function(eventObj) {
        $("<input />").attr("type", "hidden")
          .attr("name", "rate")
          .attr("value", $(".rating-product").rate("getValue"))
          .appendTo(".section-rating .rating-form form");
        return true;
      });
      @if(session('vote_alert'))
        scrollToxx();
        Swal.fire(
          '{{ session('vote_alert')['title'] }}',
          '{{ session('vote_alert')['content'] }}',
          '{{ session('vote_alert')['type'] }}'
        );
      @endif
      @if(session('alert'))
        Swal.fire(
          '{{ session('alert')['title'] }}',
          '{{ session('alert')['content'] }}',
          '{{ session('alert')['type'] }}'
        );
      @endif
    });
    $("#slide-cungloai").owlCarousel({
        items: 4,
        autoplay: true,
        autoplayHoverPause: true,
        nav: true,
        dots: false,
        responsive:{
          0:{
              items:1,
              nav:false
          },
          480:{
              items:2,
              nav:false
          },
          769:{
              items:3,
              nav:true
          },
          992:{
              items:3,
              nav:true,
          },
          1200:{
              items:4,
              nav:true
          }
        },
        navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>']
      });

  </script>
@endsection
