@extends('jpanel.layouts.app')
@section('title')
    Edit Category
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 flash-message">
            <div class="col-sm-3">
                <h1>Edit Category</h1>
            </div>
            <div class="col-6 messageArea">
                @include('jpanel/flash-message')
            </div>
            <div class="col-sm-3">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('list.category') }}">View Category</a></li>
                    <li class="breadcrumb-item active">Edit Category</li> 
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        
        @if(hasPermission('category',3))
        <div class="row">
            
            <div class="col-12">
                <!-- Default box -->
                 <!-- Profile Update box -->
                 <form action="{{ route('update.category',$category->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Category Edit Form</h3>
                            <div class="card-tools">
                                <a href="{{route('list.category')}}" class="btn btn-sm btn-secondary">
                                    <i class="fas fa-eye"></i> View All Category
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
                                <label for="name">Name</label>
                                <input type="text" class="form-control form-control-sm @error('cname') is-invalid @enderror" id="cname"
                                    name="cname" placeholder="Enter Name" value="{{$category->name}}">
                                @if ($errors->has('cname'))
                                    <div class="text-danger">{{ $errors->first('cname') }}</div>
                                @endif
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Parent Category</label>
                                <select  class="form-control form-control-sm @error('parent_id') is-invalid @enderror" id="parent_id" name="parent_id">
                                    <option value="" @if($category->parent_id==null) selected @endif>No Parent Category</option>
                                    @foreach ($categories as $cate)
                                    <option value="{{$cate->id}}" @if($category->parent_id!=null && $category->parent_id==$cate->id) selected @endif>{{$cate->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('parent_id'))
                                    <div class="text-danger">{{ $errors->first('parent_id') }}</div>
                                @endif
                            </div>


                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-secondary btn-block">Update <i
                                    class="fas fa-angle-double-right"></i></button>
                        </div>
                        <!-- /.card-footer-->

                    </div>
                    <!-- /.card -->
                </form>
                
            </div>
            
        </div>
        @endif
    </div>
</section>
<!-- /.content -->
@endsection

@section('scripts')
    @include('jpanel.user.ajax')
@endsection
