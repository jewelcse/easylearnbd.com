@extends('admin-layouts.app')

@section('content')

    <div class="row">

    <div class="col-md-12">

        <div class="card shadow mb-3 mr-2">
            <div class="card-header py-3">
                <p class="text-primary m-0 font-weight-bold">Contact from {{$contact->name}}
                    <a href="{{url('admin/contact/reply',$contact->id)}}"> <button class="btn btn-success">Reply</button></a></p>
            </div>
            <div class="card-body">
               <div class="border p-3">
                   <div class="">
                       <label class="p-2 bg-dark" style="color: #ffffff;">Name:</label>
                       <p>{{$contact->name}}</p>
                   </div>
                   <div class="d-inline-block mr-5">
                       <label class=" p-2 bg-dark" style="color: #ffffff;">Email:</label>
                       <p>{{$contact->email}}</p>
                   </div>
                   <div class="d-inline-block">
                       <label class="p-2 bg-dark" style="color: #ffffff ;">Subject:</label>
                       <p>{{$contact->subject}}</p>
                   </div>
                   <div class="">
                       <label class="p-2 bg-dark" style="color: #ffffff ;">Message:</label>
                       <p>{{$contact->message}}</p>
                   </div>
               </div>
            </div>
        </div>
    </div>
</div>

@endsection
