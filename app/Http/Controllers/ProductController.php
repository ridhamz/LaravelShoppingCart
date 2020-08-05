<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use Session;
use Stripe\Stripe;

class ProductController extends Controller
{

     public function index(){
        $products = Product::orderBy('created_at','desc')->get();
        return view('shop.index',['products'=>$products]);
    }


    public function get_add_product($productid){
        $product = Product::find($productid);
        return view('admin.modifyproduct',['product'=>$product]);
    }


    public function post_add_product(){
        $this->validate(request(),['prod_img'=>'image|mimes:jpg,jpeg,png',
                                    'title'=>'required','discription'=>'required',
                                    'price'=>'required']);
        $file = Request()->file('product_img');
        $name = $file->getClientOriginalName();
        $ext  = $file->getClientOriginalExtension();
        $size = $file->getSize();
        $mime = $file->getMimeType();
        $file->move(public_path('product_img'),'img_'.time().'.'.$ext);
        $Product = new Product;
        $Product->title = Request('title');
        $Product->description = Request('discription');
        $Product->imag_path = 'img_'.time().'.'.$ext;
        $Product->price = Request('price');
        $Product->save();
        return redirect('/home')->with(['message'=>'Product Added Successfully']);
    }

    public function post_update_product(){
        $productid = Request("id");
        $title = Request("title");
        $price=Request("price");
        $description = Request("description");
        $product = Product::find($productid);
        if($title) $product->title = $title;
        if($price) $product->price = $price;
        if($description) $product->description = $description;
        $product->update();
         return redirect("/home");
    }

    public function delete_product($productid){
        $product = Product::find($productid);
        $product->delete();
        return redirect('/home');
    }


}
