@extends('layouts.admin.admin_template')

@section('breadcrumb')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Danh mục</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Admin</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.categories.show') }}">Category</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@endsection

@section('main')
<section class="content">
    <div class="container-fluid">
        <!-- Edit Category -->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Cập nhật danh mục</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.categories.update', ['id' => $category->id]) }}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Tên danh mục</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập ..." value="{{ $category->name }}">
                                        @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Mô tả</label>
                                        <input type="text" name="desc" class="form-control @error('desc') is-invalid @enderror" placeholder="Nhập ..." value="{{ $category->desc }}">
                                        @error('desc')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <label></label>
                                    <div class="form-group">
                                        <input type="submit" class="btn bg-gradient-primary mt-2" value="Cập nhật">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.edit category -->
    </div><!-- /.container-fluid -->
</section>
@endsection