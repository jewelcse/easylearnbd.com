@extends('admin-layouts.app')

@section('content')

<div class="row">

    <div class="col-md-12">

        <div class="card shadow mb-3 mr-2">
            <div class="card-header py-3">
                <p class="text-primary m-0 font-weight-bold">All Category</p>
            </div>
            <a class="btn btn-success" href="{{url('admin/category/create')}}">New category</a>
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
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col" colspan="2" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($categories as $category)
                        <tr>
                            <th scope="row">{{++$i}}</th>
                            <td>{{$category->name}}</td>
                            <td>{{$category->slug}}</td>
                            <td>
                                <a href="{{url('admin/category/update',$category->id)}}">Update</a>
                            </td>
                            <td>
                                <form action="{{url('admin/category/delete',$category->id)}}" method="post">
                                    @csrf
{{--                                    @method('DELETE')only when model resources route declare --}}
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>

                        @endforeach
                        </tbody>

                    </table>

                    {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
