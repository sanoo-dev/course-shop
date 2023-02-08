@extends('layouts.pages.page-template')

@section('header')
    @include('layouts.pages.header')
@endsection

@section('feature')
    @include('layouts.pages.feature')
@endsection

@section('main')
    <div class="pt-lg-8 pb-lg-3 pt-4 pb-6">
        <div class="container">
            <div class="row mb-4">
                <div class="col">
                    <h1 class="mb-0 text-center">Khoá học nổi bật</h1>
                </div>
            </div>
            <div class="tab-content" id="tabContent">
                <!-- Tab Pane -->
                <div class="tab-pane fade show active" id="most-popular" role="tabpanel" aria-labelledby="most-popular-tab">
                    <div class="row">
                        @foreach ($courses as $course)
                            <div class="col-lg-4 col-md-6 col-12">
                                <!-- Card -->
                                <div class="card mb-4 card-hover">
                                    <div class="p-1">
                                        <a href="{{ route('courses.detail', ['id' => $course->id]) }}"
                                            class="card-img-top">
                                            <div class="d-flex justify-content-center position-relative rounded py-20 border-white border rounded-3 bg-cover"
                                                style="background-image: url({{ asset($course->image) }});">
                                            </div>
                                        </a>
                                    </div>
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <h3 class="h4 mb-2 text-truncate-line-2 ">
                                            <a href="{{ route('courses.detail', ['id' => $course->id]) }}"
                                                class="text-inherit">
                                                {{ $course->name }}
                                            </a>
                                        </h3>
                                        <div class="lh-1">
                                            <span>
                                                <i class="mdi mdi-star text-warning me-n1"></i>
                                                <i class="mdi mdi-star text-warning me-n1"></i>
                                                <i class="mdi mdi-star text-warning me-n1"></i>
                                                <i class="mdi mdi-star text-warning me-n1"></i>
                                                <i class="mdi mdi-star text-warning"></i>
                                            </span>
                                            <span class="text-warning">4.5</span>
                                            <span class="fs-6 text-muted">(9,300)</span>
                                        </div>
                                        <div class="mt-4">
                                            Học phí: <b>{{ number_format($course->price) }} VND</b>
                                        </div>
                                        <div>
                                            Trường/trung tâm: <b>{{ $course->teacher->school->name }}</b>
                                        </div>
                                        <div>
                                            Danh mục: <b>{{ $course->category->name }}</b>
                                        </div>
                                    </div>
                                    <!-- Card Footer -->
                                    <div class="card-footer">
                                        <div class="row align-items-center g-0">
                                            <b>GV: {{ $course->teacher->name }}</b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{ $courses->links('vendor.pagination.bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
