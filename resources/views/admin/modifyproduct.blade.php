@extends('layouts.master')
@section('title')
Update Product
 @endsection
 @section('content')
 <h1>Update Product :</h1>
<form method="POST" action={{url('/postupdateproduct')}} enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value={{$product->id}} />
    <div class="form-group">
      <label for="title">Product Title</label>
    <input type="text" value="{{$product->title}}" class="form-control
           @error('title') is-invalid @enderror" id="title"
           placeholder="Product Title" name="title">
                               @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    </div>
    <div class="form-group">
      <label for="discription">Product Description</label>
      <textarea class="form-control  @error('discription') is-invalid @enderror"
                id="description"
                placeholder="Discription" name="description" id="description" rows="3">
                {{$product->description}}
    </textarea>
      @error('discription')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    <div class="form-group">
        <label for="price">Product Price</label>
        <input type="text" value="{{$product->price}}" name="price" class="form-control
                              @error('price') is-invalid @enderror"
                              id="price"  placeholder="Product Price">
        @error('price')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
       @enderror
      </div>
    <button type="submit" class="btn btn-primary">Add Product</button>
  </form>
@endsection
