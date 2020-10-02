
@extends('layouts.app')

@section('content')
<?php

use \Illuminate\Support\Facades\Auth;
?>

<!-- Begin Top Author Page -->
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 col-md-offset-2">
            <div class="mainheading">
                <div class="row post-top-meta authorpage">
                    <div class="col-md-10 col-xs-12">

                        <h1>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h1>
                        <span class="author-description">{!! Auth::user()->bio !!}</span>

                        <div class="sociallinks">

                            <a  target="_blank" href="https://www.facebook.com/wowthemesnet/"><i class="fa fa-facebook"></i></a>
                            <span class="dot"></span>
                            <a target="_blank" href="https://plus.google.com/s/wowthemesnet/top"><i class="fa fa-google-plus"></i></a>

                        </div>

                        <a target="_blank" href="https://twitter.com/wowthemesnet" class="btn follow">Follow</a>

                    </div>
                    <div class="col-md-2 col-xs-12">
                        <img class="author-thumb" src="{{ URL::to('/') }}/images/{{Auth::user()->avater}}"  alt="{{Auth::user()->first_name ." ".Auth::user()->last_name}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Top Author Meta-->

<!-- Begin Author Posts-->

<div class="graybg authorpage">
    <div class="container">
        <div class="listrecent listrelated">

            @foreach($stories as $story)
            <!-- begin post -->
            <div class="authorpostbox">
                <div class="card">
                    <div class= "row">

                        <div class="col-md-8 author-post">
                            <h2 class="card-title">
                                <a href="{{url('story',$story->slug)}}">{{$story->title}}</a>
                            </h2>
                            <div class="metafooter">
                                <div class="wrapfooter">
									        <span class="meta-footer-thumb">
                                                <img
                                                    class="author-thumb"
                                                    src="{{ URL::to('/') }}/images/{{Auth::user()->avater}}"
                                                    alt="{{Auth::user()->first_name ." ".Auth::user()->last_name}}">
									        </span>
                                            <span class="author-meta">
									            <span class="post-name">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</span><br/>
									            <span class="post-date">{{$story->created_at->format('j F Y') }}</span><span class="dot"></span>
                                                <span class="post-read">{{ceil((str_word_count($story->body)/200))}} min read</span>
									        </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <a href="{{url('story',$story->slug)}}">
                                <img class="img-fluid img-thumb img-for-post" src="{{URL::to('/') }}/images/{{$story->img_name}}" alt="">
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end post -->
                @endforeach


        </div>
    </div>
</div>
<!-- End Author Posts-->

@endsection
