@extends('layouts.admin.admin_template')

@section('breadcrumb')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Khoá học</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Admin</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.courses.show') }}">Course</a></li>
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
        <!-- Update Course -->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Cập nhật khoá học</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.courses.update', ['id' => $course->id]) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Tên khoá học</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập ..." value="{{ $course->name }}">
                                        @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Hình ảnh</label><i> (Không bắt buộc)</i>
                                        <input type="hidden" name="oldImage" value="{{ $course->image }}">
                                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                        @error('image')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Học phí (VND)</label>
                                        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Nhập ..." value="{{ $course->price }}">
                                        @error('price')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Danh mục</label>
                                        <select name="category_id" class="form-control">
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $course->category_id ? 'selected' : ''}}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Giảng viên</label>
                                        <select name="teacher_id" class="form-control">
                                            @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}" {{ $teacher->id == $course->teacher_id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Trạng thái</label>
                                        <select name="status" class="form-control" disabled>
                                            <option value="0">Ẩn</option>
                                            <option value="1" {{ $course->status == 1 ? 'selected' : '' }}>Hiện</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Mô tả</label>
                                        <textarea name="desc" id="summernote" class="@error('desc') is-invalid @enderror">{{ $course->desc }}</textarea>
                                        @error('desc')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group text-right">
                                        <input type="submit" class="btn bg-gradient-primary mt-2" value="Cập nhật">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.update course -->
    </div><!-- /.container-fluid -->
</section>
@endsection