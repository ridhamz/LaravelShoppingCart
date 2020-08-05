<?php

namespace App\Http\Controllers;

use App\Checkout;
use App\Product;
use App\Cart;
use Session;
use Stripe\Stripe;
use App\User;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function getAddToCart($id)
    {
        $product = Product::find($id);
        $oldCart = session()->has('cart') ? session()->get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product,$product->id);
        Request()->session()->put('cart',$cart);
        return redirect('/');

    }

    public function getshoppingCart()
    {
        if(!session()->has('cart'))
           {
               return view('shop.shopping-cart',['products'=>null]);
           }
           $oldCart = session()->get('cart');
           $cart = new Cart($oldCart);
           return view('shop.shopping-cart',['products'=>$cart->items,'totalPrice'=>$cart->totalPrice]);
    }

      public function getallpayment(){
         $payments =Checkout::all();
         return view('user.allpayments',['payments'=>$payments]);
      }

     public function reduceByOne($id){
        if(!session()->has('cart'))
        {
            return view('shop.shopping-cart',['products'=>null]);
        }
        $oldCart = session()->get('cart');
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        session()->put('cart',$cart);
         return redirect('/shopping-cart');
     }

     public function reduceAll($id){
        if(!session()->has('cart'))
        {
            return view('shop.shopping-cart',['products'=>null]);
        }
        $oldCart = session()->get('cart');
        $cart = new Cart($oldCart);
        $cart->reduceAll($id);
        session()->put('cart',$cart);
         return redirect('/shopping-cart');
     }

    public function getCheckout()
    {
        if(!session()->has('cart'))
           {
               return view('shop.shopping-cart');
           }
           $oldCart = session()->get('cart');
           $cart = new Cart($oldCart);
           $total = $cart->totalPrice;
           return view('shop.checkout',['total'=>$total]);
    }
     public function postcheckout(){
        if(!session()->has('cart'))
        {
            return redirect('/');
        }
        $this->validate(request(),['name'=>'required','adress'=>'required','c-number'=>'required','c-exp-m'=>'required',
        'c-exp-y'=>'required',
        'cvc'=>'required']);

        $oldCart = session()->get('cart');
        $cart = new Cart($oldCart);
        $checkout = new Checkout;
        $checkout->name = Request('name');
        $checkout->adress = Request('adress');
        $checkout->card_number = Request('c-number');
        $checkout->exp_month = Request('c-exp-m');
        $checkout->exp_year = Request('c-exp-y');
        $checkout->cvc = Request('cvc');
        $checkout->currency ='usd';
        $checkout->totalprice = $cart->totalPrice;
        $checkout->user_id = \Auth::user()->id;
        $checkout->save();
        session()->forget('cart');
        return redirect('/')->with('success','Successffully Checkout');
     }
}
