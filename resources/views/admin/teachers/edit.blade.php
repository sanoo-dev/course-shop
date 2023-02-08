@extends('layouts.admin.admin_template')

@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Giảng viên</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Admin</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.teachers.show') }}">Teacher</a></li>
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
        <!-- Update Teacher -->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Cập nhật giảng viên</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.teachers.update', ['id' => $teacher->id]) }}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Tên giảng viên</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập ..." value="{{ $teacher->name }}">
                                        @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-group">
                                        <label>Giới tính</label>
                                        <select name="sex" class="form-control">
                                            <option value="0">Nam</option>
                                            <option value="1" {{ $teacher->sex == 1 ? 'selected' : '' }}>Nữ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Trình độ</label>
                                        <input type="text" name="level" class="form-control @error('level') is-invalid @enderror" placeholder="Nhập ..." value="{{ $teacher->level }}">
                                        @error('level')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Nơi giảng dạy</label>
                                        <select name="school_id" class="form-control">
                                            @foreach ($schools as $school)
                                            <option value="{{ $school->id }}" {{ $school->id == $teacher->school_id ? 'selected' : '' }}>{{ $school->name }}</option>
                                            @endforeach
                                        </select>
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
        <!-- /.update teacher -->
    </div><!-- /.container-fluid -->
</section>
@endsection