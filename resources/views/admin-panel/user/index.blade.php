@extends('admin-panel.master')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(Session('successMsg'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <p class="mb-0">{{Session('successMsg')}}</p><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>


                @endif
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">User</div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->status}}</td>
                                        <td>
                                            <form action="{{url('admin/users/'.$user->id.'/delete')}}" method="post" >
                                                @csrf
                                                <a href="{{url('admin/users/'.$user->id.'/edit')}}" class="btn btn-success btn-sm">
                                                    <i class="far fa-edit"></i>Edit</a>

                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure?')">
                                                    <i class="fas fa-trash"></i>Delete</button>
                                            </form>
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
            </div>
        </div>
    </div>

@endsection
