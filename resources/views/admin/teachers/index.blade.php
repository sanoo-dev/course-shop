@extends('layouts.admin.admin_template')

@section('breadcrumb')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Giảng viên</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Teacher</li>
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
            <!-- Add Teacher -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thêm giảng viên</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.teachers.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Tên giảng viên</label>
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Nhập ...">
                                            @error('name')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            <label>Giới tính</label>
                                            <select name="sex" class="form-control">
                                                <option value="0" selected>Nam</option>
                                                <option value="1">Nữ</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Trình độ</label>
                                            <input type="text" name="level"
                                                class="form-control @error('level') is-invalid @enderror"
                                                placeholder="Nhập ...">
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
                                                    <option value="{{ $school->id }}">{{ $school->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <label></label>
                                        <div class="form-group text-right">
                                            <input type="submit" class="btn bg-gradient-primary mt-2" value="Thêm">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.add teacher -->

            <!-- All Teacher -->
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tất cả giảng viên</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered text-nowrap">
                                <thead>
                                    <tr class="text-center">
                                        <th style="width: 5%">#</th>
                                        <th style="width: 30%">Tên giảng viên</th>
                                        <th style="width: 10%">Giới tính</th>
                                        <th style="width: 10%">Trình độ</th>
                                        <th style="width: 35%">Nơi giảng dạy</th>
                                        <th style="width: 10%">Tuỳ chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teachers as $teacher)
                                        <tr>
                                            <td>{{ $teachers->firstItem() + $loop->index }}</td>
                                            <td>{{ $teacher->name }}</td>
                                            <td>{{ $teacher->sex == 0 ? 'Nam' : 'Nữ' }}</td>
                                            <td>{{ $teacher->level }}</td>
                                            @foreach ($schools as $school)
                                                @if ($school->id == $teacher->school_id)
                                                    <td>{{ $school->name }}</td>
                                                @break
                                            @endif
                                    @endforeach
                                    <td class="text-center">
                                        <a href="{{ route('admin.teachers.edit', ['id' => $teacher->id]) }}"
                                            class="btn btn-sm bg-gradient-primary"><i class="fas fa-pen"></i></a>
                                        <a href="" onclick="return areYouSure('teachers/delete/{{ $teacher->id }}')"
                                            class="btn btn-sm bg-gradient-danger"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    {{ $teachers->links('vendor.pagination.bootstrap-4') }}
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.all school -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
