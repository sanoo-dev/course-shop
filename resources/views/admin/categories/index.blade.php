@extends('layouts.admin.admin_template')

@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Danh mục</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Category</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('main')
    <section class="content">
        <div class="container-fluid">
            <!-- Add Category -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thêm danh mục</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.categories.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label>Tên danh mục</label>
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
                                            <label>Mô tả</label>
                                            <input type="text" name="desc"
                                                class="form-control @error('desc') is-invalid @enderror"
                                                placeholder="Nhập ...">
                                            @error('desc')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
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

            <!-- /.add category -->

            <!-- All Category -->
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tất cả danh mục</h3>

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
                                        <th style="width: 30%">Tên danh mục</th>
                                        <th style="width: 45%">Mô tả</th>
                                        <th style="width: 10%">Tuỳ chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $categories->firstItem() + $loop->index }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td class="text-wrap">
                                                {{ $category->desc }}
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.categories.edit', ['id' => $category->id]) }}"
                                                    class="btn btn-sm bg-gradient-primary"><i
                                                        class="fas fa-pen"></i></a>
                                                <a href=""
                                                    onclick="return areYouSure('categories/delete/{{ $category->id }}')"
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
                    {{ $categories->links('vendor.pagination.bootstrap-4') }}
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.all category -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
