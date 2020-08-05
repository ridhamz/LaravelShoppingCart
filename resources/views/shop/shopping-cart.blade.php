@extends('layouts.master')
@section('title')
 shopping cart
 @endsection
 @section('content')
 @if(session()->has('cart') && session()->get('cart')->totalPrice != 0)
 <table class="table">
 <thead>
   <tr>
     <th scope="col">Image</th>
     <th scope="col">Title</th>
     <th scope="col">Price</th>
     <th scope="col">Qantity</th>
     <th scope="col">Remove</th>
   </tr>
 </thead>
            @foreach ($products as $product)
            <tbody>
                @if($product['qty'] != 0)
                    <tr>
                    <th scope="row"><img src="{{asset('product_img/'.$product['item']['imag_path'])}}" style="width:40px;height:40px;border-radius:50%" /></th>
                      <td>{{$product['item']['title']}}</td>
                      <td> ${{$product['price']}}</td>
                      <td>{{$product['qty']}}</td>
                    <td>
                    <a href="{{url('/shopping-cart/reduceByOne/'.$product['item']['id'])}}"> Reduce One</a>
                    @if($product['qty']>1)
                    | <a href="{{url('/shopping-cart/reduceAll/'.$product['item']['id'])}}"> Remove All</a>
                     @endif
                   </td>
                    </tr>
                    </tr>
                    @endif
            </tbody>
            @endforeach
 </table>

  <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <strong>Total :${{$totalPrice}}</strong>
        </div>
  </div>
  <hr>
  <div class="row">
 <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
 <a href="{{url('/shopping-cart/checkout')}}" class="btn btn-success">
        Checkout
       <a>
        </div>
  </div>

  @else
  <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <h2>Cart has no item</h2>
        </div>
  </div>
 @endif
 @endsection
@section('scripts')
<script src=”https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js”></script>

<script src=”https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js”></script>

<script type=’text/javascript’ src=”js/jquery.mycart/jquery.mycart.js”></script>
@endsection
