@extends('admin-layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12 m-auto">
        <h3 class="text-center m-auto bg-gradient-light">Review Story</h3>

        <div class="card">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <a href="{{url('admin/stories')}}" class="p-3"> <button class="btn btn-danger float-left">Back</button></a>
                <form action="{{url('admin/stories/publish')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="title"><strong>Title</strong></label>
                                    <input class="form-control" type="text" placeholder="title" value="{{$story->title}}" name="title"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="Feature Image"><strong>Feature Image</strong></label>
                                    <div class="feature-img text-center">
                                        <img style="width: 800px;height: 500px" src="{{URL::to('/') }}/images/{{$story->img_name}}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="body"><strong>Body</strong></label>
                                    <textarea
                                        class="form-control"
                                        type="text"
                                        placeholder="body"
                                        name="body"
                                        id="story-body">
                                            {{$story->body}}
                                   </textarea>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-center m-auto bg-gradient-light">Story SEO options</h3>
                        <input type="hidden" name="story_id" value="{{$story->id}}">
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="category"><strong>Category</strong></label>
                                    <select name="category_id" id="" class="form-control">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="seo_description"><strong>Seo Description:</strong></label>
                                    <textarea name="seo_description"  cols="30" rows="6" class="form-control">
                                        {!! $story->seo_description !!}
                                    </textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="seo_keywords"><strong>Seo Keywords:</strong></label>
                                    <input type="text"
                                           name="seo_keywords"
                                           id="seo_keywords"
                                           class="form-control"
                                           value="{{$story->seo_keywords}}"
                                           placeholder="keywords">

                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="category"><strong>Changed Status</strong></label>
                                    <select name="is_published" id="" class="form-control">
                                        <option value="1">Publish</option>
                                        <option value="0">Un-publish</option>
                                        <option value="-1">Need Attention</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-success">Update Status</button>

                </form>
            </div>

        </div>
    </div>
</div>

@endsection
