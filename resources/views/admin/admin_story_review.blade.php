@extends('admin-layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12 m-auto">
        <h3 class="text-center m-auto bg-gradient-light">Review Story</h3>

        <div class="card">
            <a href="{{url('admin/stories')}}" class="p-3"> <button class="btn btn-danger float-left">Back</button></a>
            <div class="card-body">
                <div class="mb-2">
                    <label for="title">Title:</label><h3>{{$story->title}}</h3>
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


        <h3 class="text-center m-auto bg-gradient-light">Story SEO options</h3>
                <form action="{{url('admin/stories/publish')}}" method="post" class="border border-success p-2">
                    @csrf
                    <input type="hidden" name="story_id" value="{{$story->id}}">
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category_id" id="" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="seo_description">Seo Description:</label>
                        <textarea name="seo_description"  cols="30" rows="6" class="form-control">
                             {!! $story->seo_description !!}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="seo_keywords">Seo Keywords:</label>
                        <input type="text"
                               name="seo_keywords"
                               id="seo_keywords"
                               class="form-control"
                               value="{{$story->seo_keywords}}"
                               placeholder="keywords">
                    </div>

                    @if($story->is_published == false)
                    <button class="btn btn-success">Publish</button>
                    @else
                        <button class="btn btn-success" disabled>Approved</button>
                    @endif

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
