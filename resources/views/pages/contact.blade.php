@extends('layouts.pages.page-template')

@section('main')
    <!-- Page Content -->
    <div class="container-fluid">
        <div class="row align-items-center min-vh-100">
            <!-- col -->
            <div class="col-lg-6 col-md-12 col-12">
                <div class="px-xl-20 px-md-8 px-4 py-8 py-lg-0">
                    <!-- content -->
                    <div class="d-flex justify-content-between mb-7 align-items-center">
                        <a href="../index-2.html"><img src="../assets/images/brand/logo/logo.svg" alt="">
                        </a>
                    </div>
                    <div class="text-dark">
                        <h1 class="display-4 fw-bold">Liên hệ</h1>
                        <p class="lead text-dark">
                            Điền vào biểu mẫu ở bên phải để liên hệ với một người nào đó trong nhóm của chúng tôi và
                            chúng tôi sẽ liên hệ ngay.
                        </p>
                        <div class="mt-8">
                            <p class="fs-4 mb-4">
                                Nếu bạn đang tìm kiếm hỗ trợ, vui lòng truy cập cổng hỗ trợ của chúng tôi trước khi liên
                                hệ trực tiếp.
                            </p>
                            <!-- address -->

                            <p class="fs-4"><i class="bi bi-telephone text-primary
                  me-2"></i> +
                                096-456-4567
                            </p>
                            <p class="fs-4"><i
                                    class="bi bi-envelope-open
                  text-primary me-2"></i>
                                sanooedu@gmail.com</p>
                            <p class="fs-4 d-flex"><i class="bi bi-geo-alt
                  text-primary me-2"></i> Thủ
                                Đức, TP. Hồ
                                Chí Minh</p>
                        </div>
                        <div class="mt-10">
                            <!--Facebook-->
                            <a href="#!" class="text-muted me-3">
                                <i class="fab fa-facebook fs-3"></i>
                            </a>
                            <!--Twitter-->
                            <a href="#!" class="text-muted me-3">
                                <i class="fab fa-twitter fs-3"></i>
                            </a>

                            <!--GitHub-->
                            <a href="#!" class="text-muted">
                                <i class="fab fa-github fs-3"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- background color -->
            <div
                class="col-lg-6 d-lg-flex align-items-center w-lg-50 min-vh-lg-100 position-fixed-lg bg-cover bg-light top-0
        right-0">
                <div class="px-4 px-xl-20 py-8 py-lg-0">
                    <!-- form section -->
                    <div id="form">
                        <!-- form row -->
                        <form class="row" action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <!-- form group -->
                            <div class="mb-3 col-12 col-md-12">
                                <label class="form-label" for="name">Họ và tên:<span
                                        class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="name" placeholder="Họ và tên" required />
                            </div>
                            <!-- form group -->
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="email">Email:<span
                                        class="text-danger">*</span></label>
                                <input class="form-control" type="email" name="email" placeholder="Email" required />
                            </div>
                            <!-- form group -->
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="phone">Số điện thoại:<span
                                        class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="phone" id="phone" placeholder="Phone"
                                    required />
                            </div>
                            <!-- form group -->
                            <div class="mb-3 col-12">
                                <label class="text-dark form-label" for="messages">Tin nhắn:</label>
                                <textarea class="form-control" name="message" rows="3" placeholder="Tin nhắn"
                                    required></textarea>
                            </div>
                            <!-- button -->
                            <div class=" col-12">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Gửi đi
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
