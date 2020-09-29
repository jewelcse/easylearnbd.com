@extends('admin-layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-3 ml-2">
                <div class="card-header py-3">
                    <p class="text-primary m-0 font-weight-bold">Update Category</p>
                </div>
                <div class="card-body">

                    @if (session('status1'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status1') }}
                        </div>
                    @endif
                    <form method="POST" action="{{url('admin/category/update',$category->id)}}">
                        @csrf
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="title"><strong>Category Name</strong></label>
                                        <input
                                            class="form-control"
                                            type="text"
                                            placeholder="category"
                                            name="name"
                                            id="name"
                                            value="{{ $category->name }}">
                                </div>
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

{{--                        <div class="form-row">--}}
{{--                            <div class="col">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="title"><strong>Category slug</strong></label>--}}
{{--                                    <input--}}
{{--                                        class="form-control"--}}
{{--                                        type="text"--}}
{{--                                        placeholder="category"--}}
{{--                                        name="slug"--}}
{{--                                        id="slug"--}}
{{--                                        value="{{ $category->slug }}">--}}
{{--                                </div>--}}
{{--                                @if ($errors->has('slug'))--}}
{{--                                    <span class="text-danger">{{ $errors->first('slug') }}</span>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <button
                                        class="btn btn-primary btn-lg"
                                        type="submit">
                                        Update
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
