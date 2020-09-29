@extends('admin-layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-3 ml-2">
                <div class="card-header py-3">
                    <p class="text-primary m-0 font-weight-bold">Create Category</p>
                </div>
                <div class="card-body">

                    @if (session('status1'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status1') }}
                        </div>
                    @endif
                    <form method="POST" action="{{url('admin/category/create')}}">
                        @csrf
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="title"><strong>Category Name</strong>
                                        <input
                                            class="form-control"
                                            type="text"
                                            placeholder="category"
                                            name="name"
                                            id="name"
                                            value="{{ old('name') }}">
                                </div>
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <button
                                        class="btn btn-primary btn-lg"
                                        type="submit">
                                        Create
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
