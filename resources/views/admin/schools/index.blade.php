@extends('layouts.admin.admin_template')

@section('breadcrumb')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Trường/trung tâm</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">School</li>
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
            <!-- Add School -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thêm trường/trung tâm</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.schools.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label>Tên trường/trung tâm</label>
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Nhập ...">
                                            @error('name')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Địa chỉ</label>
                                            <input type="text" name="address"
                                                class="form-control @error('address') is-invalid @enderror"
                                                placeholder="Nhập ...">
                                            @error('address')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-1 text-right">
                                        <label></label>
                                        <div class="form-group">
                                            <input type="submit" class="btn bg-gradient-primary mt-2" value="Thêm">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /.add school -->

            <!-- All School -->
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tất cả trường/trung tâm</h3>

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
                                        <th style="width: 30%">Tên trường/trung tâm</th>
                                        <th style="width: 55%">Địa chỉ</th>
                                        <th style="width: 10%">Tuỳ chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($schools as $school)
                                        <tr>
                                            <td>{{ $schools->firstItem() + $loop->index }}</td>
                                            <td>{{ $school->name }}</td>
                                            <td>
                                                {{ $school->address }}
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.schools.edit', ['id' => $school->id]) }}"
                                                    class="btn btn-sm bg-gradient-primary"><i
                                                        class="fas fa-pen"></i></a>
                                                <a href="" onclick="return areYouSure('schools/delete/{{ $school->id }}')"
                                                    class="btn btn-sm bg-gradient-danger"><i
                                                        class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    {{ $schools->links('vendor.pagination.bootstrap-4') }}
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.all school -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
