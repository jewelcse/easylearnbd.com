


@extends('layouts.app')

@section('content')
    <!-- Begin Category -->
    <div class="container">
        <div class="mainheading">
            <p class="lead text-center">
                @foreach($categories as $category)
                    <a href="{{route('category.story',$category->slug)}}" class="mr-2">[{{$category->name}}]</a>
                @endforeach
            </p>
        </div>
        <!-- End Category-->

        <!-- Begin List Posts-->
        <section class="recent-posts">


            <div class="section-title">
                <h2 class="text-white mb-4" style="background-color: #0f74a8;padding: 15px">{{$category_name}}</h2>
            </div>

            @if($stories->count() == 0)
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-center">No stories found! for- {{$category_name}}</h3>
                    </div>
                </div>
            @endif
            <div class="card-columns listrecent">
            @foreach($stories as $story)
                <!-- begin post -->
                    <div class="card">
                        <a href="{{route('single.story',$story->slug)}}">
                            <img class="img-fluid story-img" id="story_img" src="{{URL::to('/') }}/images/{{$story->img_name}}" alt="{{$story->title}}">
                        </a>
                        <div class="card-block">
                            <h2 class="card-title" style="font-size: 20px;"><a href="{{route('single.story',$story->slug)}}">{{$story->title}}</a></h2>
                            <div class="metafooter">
                                <div class="wrapfooter">
						<span class="meta-footer-thumb">
						<a href="{{route('author.profile',$story->user->slug)}}"><img class="author-thumb" src="{{ URL::to('/') }}/images/{{$story->user->avater}}" alt="alt="{{$story->user->first_name ." ".$story->user->last_name}}""></a>
						</span>
                                    <span class="author-meta">
						<span class="post-name"><a href="{{route('author.profile',$story->user->slug)}}">{{$story->user->first_name ." ".$story->user->last_name}}</a></span><br/>
						<span class="post-date">{{$story->created_at->format('j F Y') }}</span><span class="dot"></span>
                                        <span class="post-read">{{ceil((str_word_count($story->body)/200))}} min read</span><span class="dot"></span>
                                    <span class="post-read">{{$story->views_count ?? '0'}} views</span>
						</span>
                                    <span class="post-read-more"><a href="{{route('single.story',$story->slug)}}" title="Read Story"><svg class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25"><path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z" fill-rule="evenodd"></path></svg></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end post -->
                @endforeach
            </div>

        </section>
        <!-- End List Posts-->

        <div class="addvertise mb-2" id="advertise-7">

        </div>
    </div>


@endsection
