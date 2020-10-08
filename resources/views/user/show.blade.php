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
<table class="table table-hover">
    <tbody>
    @foreach($stories as $story)
    <tr>
        <td>{{++$i}} </td>
        <td><a href="{{route('story.show',$story->slug)}}">{{$story->title}}</a></td>
        <td>@if($story->is_published == 1)
                <p id="currentStatus">Published</p>
            @elseif($story->is_published == -1)
                <p id="currentStatus">Need attention</p>
            @elseif($story->is_published == -2)
                <p id="currentStatus">Reviewing</p>
            @else
                <p id="currentStatus">Pending</p>

            @endif </td>
        <td><a href="{{route('story.edit',$story->slug)}}">Update</a></td>
        <td><form action="{{route('story.destroy',$story->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form></td>
    </tr>
    @endforeach
    {{ $stories->links() }}
    </tbody>
</table>

    <div class="addvertise mb-2" id="advertise-7">

    </div>
</div>
@endsection
