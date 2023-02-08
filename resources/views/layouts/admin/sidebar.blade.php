<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Sanoo Edu</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3">
            <div class="text-white text-center">
                Xin chào <strong>{{ Auth::user()->name }}</strong>!
            </div>
            <div class="text-center mt-2">
                <a href="{{ route('admin.logout') }}" class="btn btn-sm btn-primary">Đăng xuất</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Bảng điều khiển
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.categories.show') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Danh mục
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.schools.show') }}" class="nav-link">
                        <i class="nav-icon fas fa-school"></i>
                        <p>
                            Trường/trung tâm
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.teachers.show') }}" class="nav-link">
                        <i class="nav-icon fas fa-chalkboard-teacher"></i>
                        <p>
                            Giảng viên
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.courses.show') }}" class="nav-link">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p>
                            Khoá học
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.forms.show') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p>
                            Phiếu đăng ký
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.contacts.show') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p>
                            Học viên liên hệ
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
