@extends('admin-panel.master')
@section('title','skill create')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header"><div class="card-title">Skill Edit Form</div></div>
                    <form action="{{url('admin/skills/'.$skill->id)}}" method="post">
                        @csrf
                        @method('patch')
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="">Name</label>
                                <input type="text" name="name" value="{{$skill->name ?? old('name')}}" placeholder="skill name"
                                       class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                <span class="text-danger"><small>{{$message}}</small></span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Percentage</label>
                                <input type="text" name="percent" value="{{$skill->percent ?? old('name')}}" placeholder="Skill percent" class="form-control @error('name') is-invalid @enderror">
                                @error('percent')
                                <span class="text-danger"><small>{{$message}}</small></span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


