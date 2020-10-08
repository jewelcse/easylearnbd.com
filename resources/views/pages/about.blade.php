@extends('layouts.app')

@section('content')
   <div class="container">
       <div class="row">
           <div class="col-md-12">
               <h3 class="outline" style="background-color: #0f74a8;padding: 15px;color: #ffffff">About US</h3>
           </div>
       </div>
       <div class="row">
           <div class="col-md-6 contact-img">
               <img src="{{URL::to('/') }}/images/contact-bg.jpg" alt="" style="width:100%;height:590px;">
           </div>
       </div>
   </div>
@endsection
