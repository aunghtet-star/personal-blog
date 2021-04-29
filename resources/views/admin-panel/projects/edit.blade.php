@extends('admin-panel.master')
@section('title','Project edit')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header"><div class="card-title">Projects Edit Form</div></div>
                    <form action="{{url('admin/projects/'.$project->id)}}" method="post">
                        @csrf
                        @method('patch')
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="">Name</label>
                                <input type="text" name="name" value="{{$project->name ?? old('name')}}" placeholder="Project name"
                                       class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                <span class="text-danger"><small>{{$message}}</small></span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Project</label>
                                <input type="text" name="url" value="{{$project->url ?? old('name')}}" placeholder="Project url" class="form-control @error('name') is-invalid @enderror">
                                @error('url')
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



