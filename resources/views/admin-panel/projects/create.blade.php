@extends('admin-panel.master')
@section('title','project create')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header"><div class="card-title">Project Create</div></div>
                    <form action="{{url('admin/projects')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="">Name</label>
                                <input type="text" name="name" value="{{old('name')}}" placeholder="Project name"
                                       class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                <span class="text-danger"><small>{{$message}}</small></span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">URL</label>
                                <input type="text" name="url" placeholder="Project URL" class="form-control @error('name') is-invalid @enderror">
                                @error('url')
                                <span class="text-danger"><small>{{$message}}</small></span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

