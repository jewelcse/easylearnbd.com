@extends('admin-layouts.app')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('content')

    <div class="row">

        <div class="col-md-12">

            <div class="card shadow mb-3 mr-2">
                <div class="card-header py-3">
                    <p class="text-primary m-0 font-weight-bold">All Stories</p>
                </div>
                <div class="card-body">

                    @if (session('status1'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status1') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Feature Image</th>
                            <th scope="col">Category</th>
                            <th scope="col">Create Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Published Date</th>
                            <th scope="col" colspan="2" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($stories as $story)
                            <tr>
                                <th scope="row">{{++$i}}</th>
                                <th>{{$story->title}}</th>
                                <td><img class="img-fluid"

                                         style="width: 100px;height: 60px;"
                                         src="{{URL::to('/') }}/images/{{$story->img_name}}"></td>

{{--                                <td>{!! Str::limit($story->body,50) !!}</td>--}}

                                <td class="badge badge-secondary text-center mt-2">{{$story->category->name ?? 'Not set'}}</td>

                                <td>{{$story->created_at->format('d/m/Y')}}</td>
                                <td id="current_status">
                                    @if($story->is_published == 1)
                                        <p id="currentStatus">Published</p>
                                    @else
                                       <p id="currentStatus">Pending</p>
                                    @endif

                                </td>
                                <td>{{$story->published_at}}</td>

                                <td>
                                    <a href="{{url('admin/story/review',$story->id)}}"><button class="btn btn-success">View</button></a>
                                </td>
                                <td>
                                    <form action="" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Remove</button>
                                    </form>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>

                    </table>

                    {{ $stories->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection

<script type="text/javascript">
    {{--console.log('action-start');--}}
    {{--$(document).ready(function() {--}}
    {{--    $("select[name='published_action']").change(function () {--}}
    {{--        var currentStatus = $('#currentStatus').valueOf();--}}
    {{--        console.log(currentStatus);--}}
    {{--        var statusValue = $(this).val();--}}
    {{--        var storyId = $(this).data("id");--}}
    {{--        console.log(statusValue + " " + storyId);--}}
    {{--        // e.preventDefault();--}}
    {{--        $.ajaxSetup({--}}
    {{--            headers: {--}}
    {{--                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')--}}
    {{--            }--}}
    {{--        });--}}

    {{--        $.ajax({--}}
    {{--            type: "GET",--}}
    {{--            url: "{{url('admin/stories/publish')}}",--}}
    {{--            data: {--}}
    {{--                sid: storyId,--}}
    {{--                status: statusValue--}}
    {{--            },--}}
    {{--            success: function (data) {--}}
    {{--                console.log(data);--}}
    {{--                //currentStatus.html(data.status);--}}

    {{--            }--}}

    {{--        });--}}
    {{--    });--}}
    {{--});--}}
</script>
