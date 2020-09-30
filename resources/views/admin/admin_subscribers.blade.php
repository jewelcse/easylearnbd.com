@extends('admin-layouts.app')

@section('content')

    <div class="row">

        <div class="col-md-12">

            <div class="card shadow mb-3 mr-2">
                <div class="card-header py-3">
                    <p class="text-primary m-0 font-weight-bold">All Subscriber</p>
                </div>
                <div class="card-body">

                    @if (session('status1'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status1') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Email</th>
                            <th scope="col">Created Date</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($subscribers as $subscriber)
                            <tr>
                                <th scope="row">{{++$i}}</th>

                                <td>{{$subscriber->email}}</td>
                                <td>{{$subscriber->created_at->format('j F Y')}}</td>
                                <td>
                                    <form action="{{url('admin/subscribers/remove',$subscriber->id)}}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Remove</button>
                                    </form>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>

                    </table>

                    {{ $subscribers->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
