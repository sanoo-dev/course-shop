@extends('layouts.admin.admin_template')

@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Phiếu đăng ký</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Registration</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('main')
    <section class="content">
        <div class="container-fluid">
            <!-- All Category -->
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tất cả phiếu đăng ký</h3>

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
                                        <th>Tên học viên</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Khoá học đã đăng ký</th>
                                        <th style="width: 10%">Tuỳ chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i = 1)
                                    @foreach ($forms as $form)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $form->student_name }}</td>
                                            <td>{{ $form->student_email }}</td>
                                            <td>{{ $form->student_phone }}</td>
                                            <td>{{ $form->course->name }}</td>
                                            <td class="text-center">
                                                <a href=""
                                                    onclick="return areYouSure('registration-form/delete/{{ $form->id }}')"
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
                    {{ $forms->links('vendor.pagination.bootstrap-4') }}
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.all form -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
