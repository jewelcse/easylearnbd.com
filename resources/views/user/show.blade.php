@extends('layouts.app')

@section('content')

    <style>
        .list-inline-item a{
            color: black;
        }
    </style>
<div class="container">
    <h3 class="text-dark mb-4">State</h3>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

<?php $i=0 ?>

                    @foreach($stories as $story)
                        <ul class="list-inline" style="font-size: 20px;">
                            <li class="list-inline-item">{{++$i}} | <a href="{{route('story.show',$story->slug)}}">{{$story->title}}</a> </li>
                                @if($story->is_published == 0)
                                    <li class="text-danger list-inline-item">pending.</li>
                                @else
                                    <li class="text-success list-inline-item">aproved</li>
                                @endif
                            <li class="list-inline-item"><a href="{{route('story.edit',$story->slug)}}">Update</a></li>
                            <li class="list-inline-item">
                            <form action="{{route('story.destroy',$story->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            </li>


                        </ul>
                    @endforeach

    </div>
</div>
@endsection
