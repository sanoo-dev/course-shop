@extends('layouts.admin.admin_template')

@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Trường/trung tâm</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Admin</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.schools.show') }}">School</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('main')
<section class="content">
    <div class="container-fluid">
        <!-- Edit School -->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Cập nhật trường/trung tâm</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.schools.update', ['id' => $school->id]) }}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Tên trường/trung tâm</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập ..." value="{{ $school->name }}">
                                        @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Địa chỉ</label>
                                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Nhập ..." value="{{ $school->address }}">
                                        @error('address')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-1 text-right">
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
        <!-- /.edit school -->
    </div><!-- /.container-fluid -->
</section>
@endsection