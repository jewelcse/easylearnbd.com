@extends('admin-layouts.app')

<script  src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/js/bootstrap.min.js"></script>

@section('content')

<div class="row">
    <div class="col-md-12 m-auto">
        <div class="card">

            <div class="card-body">
                <div class="title">
                    <h1>{{$story->title}}</h1>
                </div>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="feature-img text-center">
                    <img style="width: 800px;height: 500px" src="{{URL::to('/') }}/images/{{$story->img_name}}" alt="">
                </div>
                <div class="body">
                    {!! $story->body !!}
                </div>

                <a href="{{url('admin/stories')}}"> <button class="btn btn-danger float-lefto">Back</button></a>

                <form action="{{url('admin/stories/publish')}}" method="post">
                    @csrf
                    <input type="hidden" name="story_id" value="{{$story->id}}">
                    <select name="category_id" id="">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-success">Publish</button>
                </form>

{{--                <a href="{{url('admin/stories/publish',$story->id)}}">--}}
{{--                    <button--}}
{{--                        type="button"--}}
{{--                        class="btn btn-primary"--}}
{{--                        id="load2"--}}
{{--                        data-loading-text="<i class='fa fa-spinner fa-spin '></i>--}}
{{--                Publishing">Publish</button></a>--}}

            </div>

        </div>

    </div>
</div>

@endsection
<script>
    $(document).ready(function() {
        $('.btn').on('click', function () {
            var $this = $(this);
            $this.button('loading');
            setTimeout(function () {
                $this.button('reset');
            }, 8000);
        });
    });
</script>
