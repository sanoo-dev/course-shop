@extends('layouts.pages.page-template')

@section('header')
<div class="py-4 py-lg-6 bg-primary">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div>
                    <h1 class="text-white mb-1 display-4">Đăng ký khoá học</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('main')
<div class="container py-6">
    <div class="row">
        <div class="col-xl-8 col-lg-8 col-md-12 col-12">
            <!-- Card -->
            <div class="card  mb-4">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Phiếu đăng ký</h3>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <!-- Form -->
                    <form method="POST" action="{{ route('courses.store_register') }}" class="row">
                        @csrf
                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                        <!-- Name  -->
                        <div class="mb-3 col-12 col-md-12">
                            <label class="form-label" for="phone">Họ và tên</label>
                            <input type="text" name="student_name" class="form-control @error('student_name') is-invalid @enderror" placeholder="Nhập ...">
                            @error('student_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Email -->
                        <div class="mb-3 col-12 col-md-12">
                            <label class="form-label">Email</label>
                            <input type="email" name="student_email" class="form-control @error('student_email') is-invalid @enderror" placeholder="Nhập ...">
                            @error('student_email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Phone -->
                        <div class="mb-3 col-12 col-md-12">
                            <label class="form-label">Số điện thoại</label>
                            <input type="text" name="student_phone" class="form-control @error('student_phone') is-invalid @enderror" placeholder="Nhập ...">
                            @error('student_phone')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Button -->
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-primary">
                                Đăng ký
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-12">
            <!-- Card -->
            <div class="card mb-3 mb-4">
                <div class="p-1">
                    <div class="d-flex justify-content-center position-relative rounded py-20 border-white border rounded-3 bg-cover" style="background-image: url({{ asset($course->image)}});">
                    </div>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <!-- Price single page -->
                    <div class="mb-3">
                        <span class="text-dark fw-bold h2">Học phí: {{ number_format($course->price) }} VND</span>
                        <div class="fs-4">
                            Giá gốc:<del class="text-muted"> {{ number_format($course->price + 1000000) }} VND</del>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection