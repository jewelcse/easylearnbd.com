
@if (session('no_access'))

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong> {{ session('no_access') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

@endif

{{--                        <img  class="img-fluid loader"  id='loading' src="http://rpg.drivethrustuff.com/shared_images/ajax-loader.gif"/>--}}


{{--		<section class="recent-posts">--}}

{{--            <div class="authorpage">--}}
{{--                <div class="container">--}}
{{--                    <div class="listrecent listrelated">--}}

{{--                    @foreach($stories as $story)--}}
{{--                        <!-- begin post -->--}}
{{--                            <div class="authorpostbox">--}}
{{--                                <div class="card">--}}

{{--                                    <a href="{{route('single.story',$story->slug)}}">--}}
{{--                                        <img class="img-fluid" src="assets/img/demopic/5.jpg" alt="">--}}
{{--            					    </a>--}}
{{--                                    <div class="card-block">--}}
{{--                                        <h2 class="card-title"><a href="{{route('single.story',$story->slug)}}">{{$story->title}}</a></h2>--}}

{{--                                        <div class="metafooter">--}}
{{--                                            <div class="wrapfooter">--}}
{{--                                                <span class="meta-footer-thumb">--}}
{{--                                                            <a href="{{route('author.profile',$story->user->slug)}}"><img class="author-thumb" src="{{ URL::to('/') }}/images/{{$story->user->avater}}"  alt="{{$story->user->first_name ." ".$story->user->last_name}}"></a>--}}
{{--                                                </span>--}}
{{--                                                <span class="author-meta">--}}
{{--                                                    <span class="post-name">--}}
{{--                                                        <a href="{{route('author.profile',$story->user->slug)}}">{{$story->user->first_name ." ".$story->user->last_name}}</a>--}}
{{--                                                    </span><br/>--}}
{{--                                                    <span class="post-date">{{$story->created_at->format('j F Y') }}</span>--}}

{{--                                                    <span class="dot"></span><span class="post-read">6 min read</span>--}}
{{--                                                </span>--}}
{{--                                                <span class="post-read-more"><a href="{{route('single.story',$story->slug)}}" title="Read Story"><svg class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25"><path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z" fill-rule="evenodd"></path></svg></a></span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                                        <!-- end post -->--}}
{{--                        @endforeach--}}


{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}



{{--            --}}{{--			<div class="card-columns listrecent">--}}

{{--            @foreach($stories as $story)--}}
{{--				<!-- begin post -->--}}
{{--				<div class="card">--}}
{{--					<a href="#">--}}
{{--						<img class="img-fluid" src="{{url('assets/img/demopic/5.jpg')}}" alt="">--}}
{{--					</a>--}}
{{--					<div class="card-block">--}}
{{--						<h2 class="card-title">--}}
{{--							<a href="{{route('story.show',$story->id)}}">{{$story->title}}</a>--}}
{{--						</h2>--}}
{{--						<h4 class="card-text">--}}

{{--                        </h4>--}}
{{--						<div class="metafooter">--}}
{{--							<div class="wrapfooter">--}}
{{--								<span class="meta-footer-thumb">--}}
{{--									<a href="#">--}}
{{--										<img class="author-thumb" src="https://www.gravatar.com/avatar/e56154546cf4be74e393c62d1ae9f9d4?s=250&amp;d=mm&amp;r=x"--}}
{{--										 alt="{{$story->user->first_name ." ".$story->user->last_name}}">--}}
{{--									</a>--}}
{{--								</span>--}}
{{--								<span class="author-meta">--}}
{{--									<span class="post-name">--}}
{{--										<a href="#">{{$story->user->first_name ." ".$story->user->last_name}}</a>--}}
{{--									</span>--}}
{{--									<br/>--}}
{{--									<span class="post-date">{{$story->created_at->format('j F Y') }}</span>--}}
{{--									<span class="dot"></span>--}}
{{--									<span class="post-read">6 min read</span>--}}
{{--								</span>--}}
{{--								<span class="post-read-more">--}}
{{--									<a href="#" title="Read Story">--}}
{{--										<svg class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25">--}}
{{--											<path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z"--}}
{{--											 fill-rule="evenodd"></path>--}}
{{--										</svg>--}}
{{--									</a>--}}
{{--								</span>--}}
{{--							</div>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--				</div>--}}
{{--				<!-- end post -->--}}
{{--                @endforeach--}}
{{--			</div>--}}
{{--            --}}
{{--            --}}


{{--		</section>--}}


<!-- End List Posts-->


