


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





@section('content')
    <!-- Begin Site Title-->

    <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow mb-3">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 font-weight-bold mb-1">Create Story</p>
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
                                                        id="tag"
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
                                    <div class="tags p-3">
                                        <p class="text-capitalize">#Recent Used Tags</p>

                                            @foreach($tags as $tag)
                                                <li class="d-inline-block p-2"
                                                    style="display: block;
                                                    color: #ffffff;
                                                    background-color: #0f74a8"
                                                >
                                                    {{$tag->name." "}}<span class="badge badge-danger">{{$tag->count}}</span></li>
                                            @endforeach

                                    </div>

{{--                                    <button class="btn btn-primary" type="button" disabled>--}}
{{--                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>--}}
{{--                                        Loading...--}}
{{--                                    </button>--}}

                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <button
                                                    style="float: right"
                                                    class="btn btn-primary mb-4"
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


    <script type="text/javascript">
        $('#tag').on('keyup',function(){
            $value=$(this).val();
            console.log($value);
            {{--$.ajax({--}}
            {{--    type : 'get',--}}
            {{--    url : '{{URL::to('#')}}',--}}
            {{--    data:{'search':$value},--}}
            {{--    success:function(data){--}}
            {{--        $('tbody').html(data);--}}
            {{--    }--}}
            {{--});--}}
        });
    </script>








    <script>

// $(document).ready(function (){
//     $(document).on('keyup','#tag',function (){
//         var tag = $('#tag').val();
//         console.log(tag);
//     });
//
// });


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
