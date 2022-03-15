@extends('jpanel.layouts.app')
@section('title')
    Users
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 flash-message">
            <div class="col-sm-3">
                <h1>Users</h1>
            </div>
            <div class="col-6 messageArea">
                @include('jpanel/flash-message')
            </div>
            <div class="col-sm-3">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">View Users</li> 
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        {{-- <div class="row flash-message">
            <div class="col-12">
                @include('jpanel/flash-message')
            </div>
        </div> --}}
        <div class="row">
            <div class="col-12">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Users List</h3>
                        <div class="card-tools">
                            <a href="{{route('create.users')}}" class="btn btn-sm btn-secondary">
                                <i class="fas fa-plus-square"></i> Add New User
                            </a>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover" id="userDataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Number</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($users as $key =>$user)
                                
                                <tr class="dataRow{{$user->id}}">
                                    <td>{{++$key}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input data-id="{{$user->id}}" type="checkbox" class="custom-control-input userStatus" id="status{{$user->id}}" name="status{{$user->id}}" {{ $user->status ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="status{{$user->id}}"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('view.user',$user->id) }}" class="text-success" data-toggle="tooltip" data-placement="top" title="View"><i class="fas fa-eye"></i></a> |
                                        <a href="{{ route('edit.user',$user->id) }}" class="text-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a> |
                                        <a href="{{ route('user.permissions',$user->id) }}" class="text-primary" data-toggle="tooltip" data-placement="top" title="Permissions"><i class="fas fa-list-alt"></i></a> |
                                        <a href="javascript:void(0)" data-id="{{$user->id}}" class="text-danger delete" id="delete{{$user->id}}" name="delete{{$user->id}}" data-toggle="tooltip" data-placement="top" title="Trash"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Number</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection

@section('scripts')
    @include('jpanel.user.ajax')
@endsection
