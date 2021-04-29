@extends('admin-panel.master')
@section('title','Category edit')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header"><div class="card-title">Categories Edit Form</div></div>
                    <form action="{{url('admin/categories/'.$category->id)}}" method="post">
                        @method('patch')
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="">Name</label>
                                <input type="text" name="name" value="{{$category->name ?? old('name')}}" placeholder="Category name"
                                       class="form-control @error('name') is-invalid @enderror">
                                @error('name')
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




