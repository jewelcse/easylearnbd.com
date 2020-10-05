@extends('admin-layouts.app')

@section('content')

    <div class="row">
        <div class=" col-md-2 col-md-offset-2"></div>

        <div class="col-md-8">
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
                                <div class="form-group">
                                    <label for="title"><strong>Category Name</strong></label>
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

                        <h3 class="text-center m-auto bg-gradient-light">Category SEO options</h3>

                            <div class="form-group">
                                <label for="seo_description">Seo Description:</label>
                                <textarea name="seo_description"  cols="30" rows="6" class="form-control">
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="seo_keywords">Seo Keywords:</label>
                                <input type="text"
                                       name="seo_keywords"
                                       id="seo_keywords"
                                       class="form-control"
                                       placeholder="keywords">
                            </div>

                        <button type="submit" class="btn btn-success"> add category</button>

                    </form>
                </div>
            </div>
        </div>
        <div class=" col-md-2 col-md-offset-2"></div>
    </div>

@endsection
