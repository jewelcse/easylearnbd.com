@extends('admin-layouts.app')

@section('content')

    <div class="row">

        <div class="col-md-12">

            <div class="card shadow mb-3 mr-2">
                <div class="card-header py-3">
                    <p class="text-primary m-0 font-weight-bold">All Contacts</p>
                </div>
                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Created Date</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($contactLists as $contact)
                            <tr>
                                <th scope="row">{{++$i}}</th>

                                <td>{{$contact->name}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->subject}}</td>
                                <td>{{$contact->created_at->format('j F Y')}}</td>
                                <td><a href="{{url('admin/contact/view',$contact->id)}}"><button class="btn btn-success">View</button></a></td>
                                <td>
                                    <form action="{{url('admin/contact-remove',$contact->id)}}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Remove</button>
                                    </form>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>

                    </table>

                    {{ $contactLists->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
