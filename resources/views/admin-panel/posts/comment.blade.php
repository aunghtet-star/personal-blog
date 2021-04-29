@extends('admin-panel.master')
@section('title','category')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">
                        @if(session('successMsg'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <p class="mb-0">{{Session('successMsg')}}</p><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>cmNo</th>
                                <th>Comments</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if($comments->count() < 1)
                                <p>No comment</p>
                            @else
                                @foreach($comments as $index => $comment)
                                    <tr>
                                        <td>{{$index +1 }}</td>
                                        <td>{{$comment->text}}</td>
                                        <td>
                                            <form action="{{url('admin/posts/'.$comment->id.'/comments')}}" method="post">
                                                @csrf



                                                <button type="submit" class="btn btn-sm
                                                {{$comment->status == 'show' ? 'bg-danger' : 'bg-info' }}">
                                                    {{$comment->status == 'show' ? 'Hide' : 'Show'}}
                                                </button>



                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif


                            </tbody>
                        </table>

                    </div>
                    <div class="card-footer ">
                        <div class="m-3 float-end">

                        </div>


                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection


