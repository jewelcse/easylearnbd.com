@extends('admin-layouts.app')

@section('content')

    <div class="row">

        <div class="col-md-12">

            <div class="card shadow mb-3 mr-2">
                <div class="card-body">
                    <form action="{{url('admin/contact/reply')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">From</label>
                            <input type="email" class="form-control" value="contact@easylearnbd.com" name="from_email" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">To</label>
                            <input type="email" class="form-control" value="{{$contact->email}}" name="to_email" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Message</label>
                            <textarea class="form-control" name="message" placeholder="Message" rows="14"></textarea>

                        </div>
                        <button class="btn btn-success">Reply</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
