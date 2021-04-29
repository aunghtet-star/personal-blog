@extends('admin-panel.master')
@section('title','skill index')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6"><div class="card-title">Skills</div></div>
                            <div class="col-md-6"><a href="{{route('skills.create')}}"
                                                     class="float-end btn btn-primary btn-sm">
                                    <i class="fa fa-plus-circle"></i> Add new</a></div>
                        </div>

                    </div>
                    <div class="card-body">
                        @if(session('successMsg'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <p class="mb-0">{{Session('successMsg')}}</p><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Percent</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($skills as $skill)
                                <tr>
                                    <td>{{($skill->id)}}</td>
                                    <td>{{($skill->name)}}</td>
                                    <td>{{($skill->percent)}}</td>
                                    <td>
                                        <form action="{{url('admin/skills/'.$skill->id)}}" method="post">
                                            @csrf @method('delete')
                                            <a class="btn btn-primary btn-sm" href="{{url('admin/skills/'.$skill->id.'/edit')}}">
                                                <i class="far fa-edit"></i>Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')" ><i class="far fa-trash-alt"></i> Delete></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>
                    <div class="card-footer ">
                        <div class="m-3 float-end">
                            {{ $skills->links()  }}
                        </div>


                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
@section('javascript')
<script>
    $(document).ready(function(){
        $('#addBtn').click(function (){
            alert('jello');
        })
    });
</script>
@endsection
