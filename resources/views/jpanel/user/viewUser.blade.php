@extends('jpanel.layouts.app')
@section('title')
    View User Detail
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>View User Detail</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('list.users') }}">View Users</a></li>
                    <li class="breadcrumb-item active">View User Details</li> 
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row flash-message">
            <div class="col-12">
                @include('jpanel/flash-message')
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <!-- Default box -->
                 <!-- Profile Update box -->
                 <form action="{{ route('update.user',$user->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">View {{$user->name}} Details</h3>
                            <div class="card-tools">
                                <a href="{{route('list.users')}}" class="btn btn-sm btn-secondary">
                                    <i class="fas fa-eye"></i> View All Users
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
                            <div class="form-group">
                                <img height="80px" src="{{ asset('/storage/images/userProfile/'.$user->avatar) }}" class="img-circle elevation-2 mb-4 p-2">
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                {{$user->name}}
                            </div>
                            <div class="form-group">
                                <label for="name">User Name</label>
                                {{$user->username}}
                            </div>
                            <div class="form-group">
                                <label for="name">Phone</label>
                                {{$user->phone}}
                            </div>
                            <div class="form-group">
                                <label for="name">Email</label>
                                {{$user->email}}
                            </div>
                            <div class="form-group">
                                <label for="name">Status</label>
                                {{$user->status===1?"Active":"Inactive"}}
                            </div>
                        </div>                        
                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->
                </form>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection

@section('scripts')
    @include('jpanel.user.ajax')
@endsection
