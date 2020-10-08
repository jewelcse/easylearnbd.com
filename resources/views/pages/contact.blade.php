@extends('layouts.app')

@section('content')
  <div class="container">
      @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
      @endif
      <div class="row">
         <div class="col-md-12">
             <h3 class="outline" style="background-color: #0f74a8;padding: 15px;color: #ffffff">Contact US</h3>
         </div>
      </div>
     <div class="row">
         <div class="col-md-6 contact-img">
             <img src="{{URL::to('/') }}/images/contact-bg.jpg" alt="" style="width:100%;height:590px;">
         </div>
         <div class="col-md-6">
             <div class="contact-clean" >

                 <form method="POST" action="{{route('contact-form-submit')}}">
                     @csrf
                     <h2 class="text-center">Contact us</h2>
                     <div class="form-group">
                         <input class="form-control" type="text" name="name" placeholder="Name">
                         <small class="form-text text-danger">
                             @if ($errors->has('name'))
                                 <span class="text-danger">{{ $errors->first('name') }}</span>
                             @endif
                         </small>
                     </div>
                     <div class="form-group">
                         <input class="form-control" type="text" name="subject" placeholder="Subject">
                         <small class="form-text text-danger">
                             @if ($errors->has('subject'))
                                 <span class="text-danger">{{ $errors->first('subject') }}</span>
                             @endif
                         </small>
                     </div>
                     <div class="form-group">
                         <input class="form-control is-invalid" type="email" name="email" placeholder="Email">
                         <small class="form-text text-danger">
                             @if ($errors->has('email'))
                                 <span class="text-danger">{{ $errors->first('email') }}</span>
                             @endif
                         </small>
                     </div>
                     <div class="form-group">
                         <textarea class="form-control" name="message" placeholder="Message" rows="14"></textarea>
                         <small class="form-text text-danger">
                             @if ($errors->has('message'))
                                 <span class="text-danger">{{ $errors->first('message') }}</span>
                             @endif
                         </small>
                     </div>
                     <div class="form-group"><button class="btn btn-primary" type="submit">send </button></div>
                 </form>
             </div>
         </div>
     </div>
  </div>

@endsection
