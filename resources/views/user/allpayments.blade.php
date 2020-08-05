@extends('layouts.master')
@section('title')
 Your History
 @endsection
 @section('content')
 <h1 style="margin-top:10px">Your History:</h1>
 <table class="table" style="margin-top:50px">
 <thead>
   <tr>
     <th scope="col">User Name</th>
     <th scope="col">Amount</th>
     <th scope="col">Card Number</th>
     <th scope="col">Date</th>
   </tr>
 </thead>
            @foreach ($payments as $p)
            @if($p->user_id == \Auth::user()->id)
            <tbody>
                    <tr>
                    <th scope="row">{{$p->name}}</th>
                    <td>${{$p->totalprice}}</td>
                    <td>{{$p->card_number}}</td>
                      <td>{{$p->created_at}} </td>
                    </tr>
                    </tr>
            </tbody>
            @endif
            @endforeach
 </table>
 @endsection
@section('scripts')
<script src=”https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js”></script>

<script src=”https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js”></script>

<script type=’text/javascript’ src=”js/jquery.mycart/jquery.mycart.js”></script>
@endsection
