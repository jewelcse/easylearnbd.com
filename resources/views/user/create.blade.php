


@extends('layouts.app')

<style>
    .bootstrap-tagsinput .tag {
        margin-right: 2px;
        color: #ffffff !important;
        background-color: #021b32;
        padding: 5px;
    }
    .bootstrap-tagsinput .tag [data-role="remove"] {
        margin-left: 8px;
        cursor: pointer;
        color: red;
    }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




@section('content')
    <!-- Begin Site Title-->

    <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow mb-3">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 font-weight-bold">Create Story</p>
                            </div>
                            <div class="card-body">

                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('story.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="title"><strong>Title</strong>
                                                    <span class="text-danger">*</span>
                                                    <span class="text-danger">-must be less than 200 words</span></label>
                                                <input
                                                    class="form-control"
                                                    type="text"
                                                    placeholder="title"
                                                    name="title"
                                                    id="title"
                                                    value="{{ old('title') }}">
                                            </div>
                                            @if ($errors->has('title'))
                                                <span class="text-danger">{{ $errors->first('title') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="img"><strong>Feature Image</strong>
                                                    <span class="text-danger">*</span>
                                                    <span class="text-danger">-Remember You can set Feature Image only first time, can't be updated!</span>
                                                </label>
                                                <input
                                                    id="img"
                                                    class="form-control"
                                                    type="file"
                                                    name="img_name"
                                                    value="{{ old('img_name') }}">
                                            </div>
                                            @if ($errors->has('img_name'))
                                                <span class="text-danger">{{ $errors->first('img_name') }}</span>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="body">
                                                    <strong>Body</strong>
                                                    <span class="text-danger">*</span></label>
                                                <textarea
                                                    class="tinymce"
                                                    type="text"
                                                    placeholder="body"
                                                    name="body"
                                                    id="story-body">
                                                    {{ old('body') }}
                                                </textarea>
                                                @if ($errors->has('body'))
                                                    <span class="text-danger">{{ $errors->first('body') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Tags : <span class="text-danger">*</span></label>
                                                <br>
                                                    <input
                                                        type="text"
                                                        name="tag"
                                                        value="{{ old('tag') }}"
                                                        class="form-control"
                                                        data-name="tags-input"
                                                        data-role="tagsinput">
                                                <br>
                                                @if ($errors->has('tag'))
                                                    <span class="text-danger">{{ $errors->first('tag') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <button
                                                    class="btn btn-primary btn-lg"
                                                    type="submit">
                                                   Submit Story
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>

//        $.ajaxSetup({
//            headers: {
//                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//            }
//        });

{{--        $('#title').change(function(e) {--}}
{{--            $.get(' {{url('/story/checkSlug') }}',--}}
{{--                {'title':$(this).val()},--}}
{{--                function (data){--}}
{{--                    $('#slug').val(data.slug);--}}
{{--                }--}}
{{--            );--}}

{{--        });--}}

        {{--$('#title').change(function(e) {--}}
        {{--    $.get(' {{url('/story/checkSlug') }}',--}}
        {{--        {'title':$(this).val()},--}}
        {{--        function (data){--}}
        {{--            $('#slug').val(data.slug);--}}
        {{--        }--}}
        {{--    );--}}
        {{--});--}}
    </script>
@endsection
