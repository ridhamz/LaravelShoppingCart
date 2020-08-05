@extends('layouts.master')
@section('title')
Admin Dashboard
@endsection
@section('content')
<div class="row">
    <div class="col-sm-4" style="border-right:1px solid #000 ; margin-top: 10px">
      @include('admin.addproduct')
    </div>
    <div class="col-sm-8">
      @include('admin.allproducts')
    </div>
  </div>
@endsection
