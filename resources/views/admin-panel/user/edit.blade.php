@extends('admin-panel.master')
@section('title','dashboard')
@section('content')

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h5></h5>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit form</div>
                        </div>
                        <form action="{{url('admin/users/'.$edit->id.'/update')}}" method="post">
                        @csrf
                        <div class="card-body">

                            <div class="mb-3">
                                <label for="">Name</label>
                                <input type="text" name="name" value="{{$edit->name}}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Email</label>
                                <input type="email" name="email" value="{{$edit->email}}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Status</label>
                                <select name="status" id="" class="form-select">
                                    <option value="">Select role</option>

                                    <option value="admin" @if($edit->status == 'admin') selected  @endif>Admin</option>


                                    <option value="user" @if($edit->status == 'user') selected @endif>User</option>
                                </select>

                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection





