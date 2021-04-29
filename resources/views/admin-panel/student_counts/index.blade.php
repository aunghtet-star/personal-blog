@extends('admin-panel.master')
@section('title','s_count index')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6"><div class="card-title">Student count</div></div>
                        </div>

                    </div>
                    <div class="card-body">
                        @if(session('successMsg'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <p class="mb-0">{{Session('successMsg')}}</p><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if($student_counts->count() < 1)
                            <form action="{{url('admin/student_counts')}}" method="post" class="mb-3">
                                @csrf
                                <div class="input-group ">
                                    <input name="count" type="number"  class="form-control @error('count') is-invalid  @enderror">
                                    <button class="btn btn-primary" type="submit">Create</button>
                                </div>
                                @error('count')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </form>
                            @endif
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>

                                <th>Total student</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    @if($student)
                                     <td>{{$student->count}}</td>
                                    <td>
                                            <button class="btn btn-info btn-sm " id="addBtn" >
                                                <i class="fa fa-plus-circle"></i> add more students</button>

                                        <form action="{{url('admin/student_counts/'.$student->id.'/update')}}" method="post" id="addform" style="display: none" class="col-md-5">
                                            @csrf
                                            <div class="input-group ">
                                                <input type="number" name="count" class="form-control" placeholder="enter student count">
                                                <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-plus-square"></i> Add</button>
                                            </div>
                                        </form>
                                    </td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="card-footer ">
                        <div class="m-3 float-end">
                            {{--{{ $skills->links()  }}--}}
                        </div>


                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
@section('jquery')
    <script>
        $(document).ready(function (){
            $('#addBtn').click(function (){
                $('#addform').css('display','block');
                $(this).css('display','none');
            });
        })
    </script>
@endsection


