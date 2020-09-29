@extends('admin-layouts.app')

@section('content')

    <div class="row">

        <div class="col-md-12">

            <div class="card shadow mb-3 mr-2">
                <div class="card-header py-3">
                    <p class="text-primary m-0 font-weight-bold">All Users</p>
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
                            <th scope="col">Avatar</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col" colspan="2" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($users as $user)
                            <tr>
                                <th scope="row">{{++$i}}</th>
                                <td><img class="img-fluid"

                                         style="width: 40px;height: 40px;border-radius: 50%"
                                         src="{{URL::to('/') }}/images/{{$user->avater}}"></td>
                                <td>{{$user->first_name}}</td>
                                <td>{{$user->last_name}}</td>
                                <td>{{$user->email}}</td>
                                <td><a href="{{url('admin/user/profile',$user->id)}}"><button class="btn btn-success">View Profile</button></a></td>

                                <td>
                                    <form action="{{url('admin/user/delete',$user->id)}}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Remove</button>
                                    </form>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>

                    </table>

                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
