<h1 style="color: red;text-decoration:underline">ADD PRODUCT :</h1>
<form method="post" action={{url('/postaddproduct')}} enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="title">Product Title</label>
    <input type="text" value="{{old('title')}}" class="form-control  @error('title') is-invalid @enderror" id="title"  placeholder="Product Title" name="title">
                               @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    </div>
    <div class="form-group">
      <label for="discription">Product Description</label>
      <textarea class="form-control  @error('discription') is-invalid @enderror" value="{{old('discription')}}" id="discription" placeholder="Discription" name="discription" id="discription" rows="3"></textarea>
      @error('discription')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    <div class="form-group">
        <label for="price">Product Price</label>
        <input type="text" value="{{old('price')}}" name="price" class="form-control @error('price') is-invalid @enderror" id="price"  placeholder="Product Price">
        @error('price')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
       @enderror
      </div>
    <div class="form-group">
      <label for="exampleInputFile">Product Image</label>
      <input type="file" class="form-control-file @error('product_img') is-invalid @enderror" value="{{old('product_img')}}" name='product_img' id="exampleInputFile" aria-describedby="fileHelp">
      @error('product_img')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
     @enderror
    </div>
    <button type="submit" class="btn btn-primary">Add Product</button>
  </form>
