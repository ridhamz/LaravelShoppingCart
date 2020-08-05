@extends('layouts.master')
@section('title')
 laravel shopping cart
 @endsection
 @section('content')
 @if(session()->has('success'))
     <div class="alert alert-success">
         {{session()->get('success')}}
     </div>
    @endif
<div class="row index_row" style="margin-top: 30px">
    @foreach ($products as $product)
    <div class="col-xm-1 col-md-6 col-lg-3   index_col">
            <div class="card cc" style="width: 18rem; height:25rem" >
                    <img src={{asset('product_img/'.$product->imag_path)}}
                                  class="card-img-top" alt="..."
                                  style="width:100%;">
                    <div class="card-body">
                      <h5 class="card-title">{{$product->title}}</h5>
                      <p class="card-text c_text">{{$product->description}}</p>
                      <span class="price"
                             style="margin-right: 110px;color:red;"
                        >${{$product->price}}</span>
                      <a href="{{url('add-to-cart/'.$product->id)}}"
                         class="btn btn-success btn-sm add_cart"
                         >
                         Add to cart
                         </a>
                    </div>
                  </div>
     </div>

    @endforeach

 @endsection
