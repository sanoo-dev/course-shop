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
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Course</li>
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
            <!-- All Course -->
            <div class="row">
                <div class="col-sm-12 text-right">
                    <a href="{{ route('admin.courses.create') }}" class="btn btn-success">
                        Thêm khoá học
                    </a>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tất cả khoá học</h3>
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
                                        <th>Tên khoá học</th>
                                        <th style="width: 10%">Hình ảnh</th>
                                        <th>Mô tả</th>
                                        <th>Giảng viên</th>
                                        <th>Học Phí</th>
                                        <th>Danh mục</th>
                                        <th>Trạng thái</th>
                                        <th>Tuỳ chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses as $course)
                                        <tr>
                                            <td>{{ $courses->firstItem() + $loop->index }}</td>
                                            <td>{{ $course->name }}</td>
                                            <td>
                                                <div class="text-center">
                                                    <a href="#" onclick="showImage('{{ asset($course->image) }}')"
                                                        style="cursor: zoom-in;">
                                                        <img src="{{ asset($course->image) }}" class="rounded"
                                                            alt="{{ $course->name }}" width="50" height="50">
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <button class="btn bg-gradient-primary"
                                                    onclick="showDesc('{{ $course->desc }}')">
                                                    Hiển thị
                                                </button>
                                            </td>
                                            <td>{{ $course->teacher->name }}</td>
                                            <td>{{ number_format($course->price) }} VND</td>
                                            <td>{{ $course->category->name }}</td>
                                            <td class="text-center">
                                                <span>
                                                    <a href="{{ route('admin.courses.status', ['id' => $course->id]) }}">
                                                        <i
                                                            class="fas {{ $course->status == 1 ? 'fa-eye' : 'fa-eye-slash' }}"></i>
                                                    </a>
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.courses.edit', ['id' => $course->id]) }}"
                                                    class="btn btn-sm bg-gradient-primary"><i
                                                        class="fas fa-pen"></i></a>
                                                <a href=""
                                                    onclick="return areYouSure('courses/delete/{{ $course->id }}')"
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
                    {{ $courses->links('vendor.pagination.bootstrap-4') }}
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.all course -->
        </div><!-- /.container-fluid -->
        <!-- Modal -->
        <div class="modal fade" id="show_desc" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="show_desc">Mô tả</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="desc">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"
                            aria-label="Close">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- show desc -->
        <script type="text/javascript">
            function showDesc(desc) {
                $('#desc').html(desc)
                $('#show_desc').modal('show');
            }
        </script>
    </section>
@endsection
