


@extends('layouts.app')

@section('content')
    <!-- Begin Site Title
================================================== -->

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-3">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Edit Story</p>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('story.update',$story->id) }}">
                            @csrf
                            @method('PUT')
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

                            <div class="form-group"><button class="btn btn-primary btn-sm" type="submit">Update</button></div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
