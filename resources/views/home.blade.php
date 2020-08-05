@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
       @if(\Auth::user()->admin)
         @include('admin.dashboard',["products"=>$products])
       @else
         @include('shop.shopping-cart')
       @endif
        </div>
    </div>
</div>
@endsection
