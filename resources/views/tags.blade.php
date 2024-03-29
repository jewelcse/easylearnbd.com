


@extends('layouts.app')


@section('content')
    <!-- Begin Category -->
    <div class="container">
        <!-- Begin List Posts-->



        <div class="section-title">
            <h2 class="text-white mb-4" style="background-color: #0f74a8;padding: 15px">{{$stories->count()}} stories are available for- {{$tags }}</h2>
        </div>

        <div class="container">
            <div class=" listrecent listrelated ">

            @foreach($stories as $story)
                <!-- begin post -->
                    <div class="authorpostbox">
                        <div class="card pl-2">

                            <div class= "row">
                                <div class="col-md-8 author-post">
                                    <h2 class="card-title">
                                        <a href="{{route('single.story',$story->slug)}}">{{$story->title}}</a>
                                    </h2>
                                    <div class="metafooter">
                                        <div class="wrapfooter">
									        <span class="meta-footer-thumb">
                                                <img
                                                    class="author-thumb"
                                                    src="{{ URL::to('/') }}/images/{{$story->user->avater}}"
                                                    alt="{{$story->user->first_name ." ".$story->user->last_name}}">
									        </span>
                                            <span class="author-meta">
									            <span class="post-name">{{$story->user->first_name}} {{$story->user->last_name}}</span><br/>
									            <span class="post-date">{{$story->created_at->format('j F Y') }}</span><span class="dot">

                                                    </span><span class="post-read">{{ceil((str_word_count($story->body)/200))}} min read</span>
									        </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <a href="{{route('single.story',$story->slug)}}">
                                        <img class="img-fluid img-thumb img-for-post" style="background-size: cover;
height: 180px;" src="{{URL::to('/') }}/images/{{$story->img_name}}" alt="">
                                    </a>
                                </div>
                            </div>


                        </div>
                    </div>
                    <!-- end post -->
                @endforeach


            </div>
        </div>

        <div class="addvertise mb-2" id="advertise-7">

        </div>
    </div>


@endsection
