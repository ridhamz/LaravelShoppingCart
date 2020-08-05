 <table class="table">
<thead>
   <tr>
     <th scope="col">Image</th>
     <th scope="col">Name</th>
     <th scope="col">Price</th>
     <th scope="col">Actions</th>
   </tr>
 </thead>
            @foreach ($products as $product)
            <tbody>
                    <tr>
                    <th scope="row">
                       <img src="{{asset('product_img/'.$product->imag_path)}}"
                       style="width:40px;height:40px;border-radius:50%" />
                     </th>
                      <td>{{$product->title}}</td>
                      <td> ${{$product->price}}</td>
                       <td>
                      <a href="{{url('/deleteproduct/'.$product->id)}}"
                          class="btn btn-danger btn-sm">Delete</a> |

                      <a href="{{url('/updateproduct/'.$product->id)}}"
                          class="btn btn-success btn-sm">Modify</a> |

                      <a class="btn btn-warning btn-sm" data-toggle="modal"
                         data-target="#details">Product Details</a>
                      </td>
                    </tr>
            </tbody>
            @endforeach
 </table>



<!--Details Modal -->
<div class="modal fade" id="details" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Product Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Price :...<br>
        Desxription :....<br>
        Number of bying : ....<br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

