@extends('layouts.pages.page-template')

@section('main')
    <!-- Page header -->
    <div class="pt-lg-8 pb-lg-16 pt-8 pb-12 bg-primary">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-7 col-md-12">
                    <div>
                        <h1 class="text-white display-4 fw-semi-bold"> {{ $course->name }}</h1>
                        <div class="d-flex align-items-center">
                            <span class="text-white ms-3"><i class="fe fe-users text-white-50"></i>
                                {{ count($course->forms) }} học viên đã đăng ký</span>
                            <span class="text-white ms-3"><i class="fe fe-database text-white-50"></i>
                                {{ $course->category->name }}</span>
                            <span class="text-white ms-3"><i class="fe fe-user text-white-50"></i>
                                {{ $course->teacher->name }} </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="pb-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12 mt-n8 mb-4 mb-lg-0">
                    <!-- Card -->
                    <div class="card rounded-3">
                        <!-- Card header -->
                        <div class="card-header border-bottom-0 p-0">
                            <h2 class="mt-4 text-center">
                                Chi tiết khoá học
                            </h2>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="row p-5">
                                {!! $course->desc !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12 mt-lg-n22">
                    <!-- Card -->
                    <div class="card mb-4">
                        <div class="p-1">
                            <div class="d-flex justify-content-center position-relative rounded py-20 border-white border rounded-3 bg-cover"
                                style="background-image: url({{ asset($course->image) }});">
                            </div>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <!-- Price single page -->
                            <div class="mb-3">
                                <span class="text-dark fw-bold h2">Học phí: {{ number_format($course->price) }} VND</span>
                                <div class="fs-4">
                                    Giá gốc:<del class="text-muted"> {{ number_format($course->price + 1000000) }}
                                        VND</del>
                                </div>
                            </div>
                            <div class="d-grid">
                                <a href="{{ route('courses.register', ['id' => $course->id]) }}"
                                    class="btn btn-primary mb-2">Đăng ký ngay</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card -->
                    <div class="card mb-4">
                        <div>
                            <!-- Card header -->
                            <div class="card-header">
                                <h4 class="mb-0">Thông tin khoá học</h4>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item bg-transparent"><i
                                        class="fe fe-play-circle align-middle me-2 text-primary"></i>
                                    Tên khoá học: <b>{{ $course->name }}</b>
                                </li>
                                <li class="list-group-item bg-transparent"><i
                                        class="fe fe-play-circle align-middle me-2 text-primary"></i>
                                    Danh mục: <b>{{ $course->category->name }}</b>
                                </li>
                                <li class="list-group-item bg-transparent"><i
                                        class="fe fe-play-circle align-middle me-2 text-primary"></i>
                                    Giảng viên: <b>{{ $course->teacher->name }}</b>
                                </li>
                                <li class="list-group-item bg-transparent"><i
                                        class="fe fe-play-circle align-middle me-2 text-primary"></i>
                                    Trình độ: <b>{{ $course->teacher->level }}</b>
                                </li>
                                <li class="list-group-item bg-transparent"><i
                                        class="fe fe-play-circle align-middle me-2 text-primary"></i>
                                    Trường/trung tâm: <b>{{ $course->teacher->school->name }}</b>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Card -->
                </div>
            </div>
        </div>
    </div>
@endsection
