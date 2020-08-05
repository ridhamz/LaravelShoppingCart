@extends('layouts.master')
@section('title')
 Checkout
 @endsection
 @section('content')
 <div class="container-fluid py-3">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 col-lg-4 mx-auto">
                <div id="pay-invoice" class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center">Checkout</h3>
                        </div>
                        <hr>
                    <h4 style="color:red">Your Total :${{$total}}</h4>

                    <form action="{{url('/shoppingcart/checkout')}}" id="form-checkout" method="post" novalidate="novalidate" class="needs-validation">
                 @csrf
                            <div class="form-group">
                                <label for="name" class="control-label mb-1">Name</label>
                                <input id="name" name="name" type="text" class="form-control input-sm @error('name') is-invalid @enderror" aria-required="true" aria-invalid="false" required>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                    <label for="adress" class="control-label mb-1 ">Adress</label>
                                    <input id="adress" name="adress"  type="text" class="form-control input-sm @error('adress') is-invalid @enderror" aria-required="true" aria-invalid="false" required>
                                    @error('adress')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            <div class="form-group">
                                <label for="c-number" class="control-label mb-1">Card number</label>
                                <input id="c-number" name="c-number"  type="text" class="form-control  @error('c-number') is-invalid @enderror" required="" ">
                                @error('c-number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="c-exp-m" class="control-label mb-1">Expiration Month</label>
                                        <input id="c-exp-m" name="c-exp-m" type="tel" class="form-control cc-exp input-sm  @error('c-exp-m') is-invalid @enderror" required  autocomplete="cc-exp">
                                        @error('c-exp-m')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="c-exp" class="control-label mb-1">Expiration Year</label>
                                        <input id="c-exp-y" name="c-exp-y" type="tel" class="form-control cc-exp input-sm  @error('c-exp-y') is-invalid @enderror"  autocomplete="cc-exp">
                                        @error('c-exp-y')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="cvc" class="control-label mb-1">CVC</label>
                                <input id="cvc" name="cvc" type="text" class="form-control input-sm @error('cvc') is-invalid @enderror" value="" data-val="true" data-val-required="Please enter the ZIP/Postal code" autocomplete="postal-code">
                                @error('cvc')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                            </div>
                            <div>
                                <button id="payment-button" type="submit" class="btn btn-sm btn-success btn-block">
                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                    <span id="payment-button-amount">Buy Now</span>
                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 @endsection
 @section('scripts')
 <script src="https://js.stripe.com/v2/"></script>
<script src="{{asset('js/checkout.js')}}"></script>
 @endsection
