
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mainheading">
            <p class="lead text-center">
                @foreach($categories as $category)
                    <a href="{{route('category.story',$category->slug)}}" class="mr-2">[{{$category->name}}]</a>
                @endforeach
            </p>
        </div>

{{--        <div class="row">--}}
{{--            <div class="col-md-12">--}}
{{--                <form class="example" action="{{route('story.search')}}">--}}
{{--                    <input type="text" placeholder="Search.." name="query">--}}
{{--                    <button type="submit"><i class="fa fa-search"></i></button>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}


        <!-- Begin Featured -->
        <section class="featured-posts">
            <div class="section-title">
                <h2><span>Featured</span></h2>
            </div>
            <div class="card-columns listfeaturedtag">

                @foreach($featureStories as $fStory)
                <!-- begin post -->
                <div class="card">
                    <div class="row">
                        <div class="col-md-5 wrapthumbnail">
                            <a href="{{route('single.story',$fStory->slug)}}">
                                <div class="thumbnail" style="background-image:url({{URL::to('/') }}/images/{{$fStory->img_name}});">
                                </div>
                            </a>
                        </div>
                        <div class="col-md-7">
                            <div class="card-block">
                                <h2 class="card-title"><a href="{{route('single.story',$fStory->slug)}}">{{$fStory->title}}</a></h2>
                                <h4 class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</h4>
                                <div class="metafooter">
                                    <div class="wrapfooter">
								    <span class="meta-footer-thumb">
								        <a href="{{route('author.profile',$fStory->user->slug)}}"><img class="author-thumb" src="{{ URL::to('/') }}/images/{{$fStory->user->avater}}" alt="{{$fStory->user->first_name ." ".$fStory->user->last_name}}"></a>
								    </span>
                                        <span class="author-meta">
								        <span class="post-name"><a href="{{route('author.profile',$fStory->user->slug)}}">{{$fStory->user->first_name ." ".$fStory->user->last_name}}</a></span><br/>
								        <span class="post-date">{{$fStory->created_at->format('j F Y') }}</span>
                                            <span class="dot"></span><span class="post-read">{{ceil((str_word_count($fStory->body)/200))}} min read</span>
                                            <span class="post-read">{{$fStory->views_count ?? '0'}} views</span>
								    </span>
                                        <span class="post-read-more"><a href="{{route('single.story',$fStory->slug)}}" title="Read Story"><svg class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25"><path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z" fill-rule="evenodd"></path></svg></a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end post -->
                    @endforeach

            </div>
        </section>
        <!-- End Featured
        ================================================== -->

        <!-- Begin List Posts
        ================================================== -->
        <section class="recent-posts">
            <div class="section-title">
                <h2><span>All Stories</span></h2>
            </div>
            <div class="card-columns listrecent">

            @foreach($stories as $story)
                <!-- begin post -->
                <div class="card">
                    <a href="{{route('single.story',$story->slug)}}">
                        <img class="img-fluid" src="{{URL::to('/') }}/images/{{$story->img_name}}" alt="{{$story->title}}">
                    </a>
                    <div class="card-block">
                        <h2 class="card-title"><a href="{{route('single.story',$story->slug)}}">{{$story->title}}</a></h2>
                        <h4 class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</h4>
                        <div class="metafooter">
                            <div class="wrapfooter">
						<span class="meta-footer-thumb">
						<a href="{{route('author.profile',$story->user->slug)}}"><img class="author-thumb" src="{{ URL::to('/') }}/images/{{$story->user->avater}}" alt="{{$story->user->first_name ." ".$story->user->last_name}}"></a>
						</span>
                                <span class="author-meta">
						<span class="post-name"><a href="{{route('author.profile',$story->user->slug)}}">{{$story->user->first_name ." ".$story->user->last_name}}</a></span><br/>
						<span class="post-date">{{$story->created_at->format('j F Y') }}</span><span class="dot"></span><span class="post-read">{{ceil((str_word_count($story->body)/200))}} min read</span><span class="dot"></span><span class="post-read">{{$story->views_count ?? '0'}} views</span>
						</span>
                                <span class="post-read-more"><a href="{{route('single.story',$story->slug)}}" title="Read Story"><svg class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25"><path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z" fill-rule="evenodd"></path></svg></a></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end post -->
                @endforeach
                {{ $stories->links() }}
            </div>
        </section>
        <!-- End List Posts
        ================================================== -->


    </div>

@endsection
