<nav class="navbar navbar-expand-lg navbar-default">
    <div class="container-fluid px-0">
        <a class="navbar-brand" href="{{ route('home') }}">
            <h1><b>Sanoo Edu</b></h1>
        </a>

        <!-- Button -->
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-default"
            aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar top-bar mt-0"></span>
            <span class="icon-bar middle-bar"></span>
            <span class="icon-bar bottom-bar"></span>
        </button>

        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbar-default">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarBrowse" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" data-bs-display="static">
                        Danh mục
                    </a>
                    <ul class="dropdown-menu dropdown-menu-arrow" aria-labelledby="navbarBrowse">
                        @foreach ($categories as $category)
                            <li>
                                <a href="{{ route('categories', ['id' => $category->id]) }}" class="dropdown-item">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('courses') }}">
                        Khoá học
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">
                        Liên hệ
                    </a>
                </li>
            </ul>
            <form class="mt-3 mt-lg-0 ms-lg-3 d-flex align-items-center" method="POST" action="{{ route('search') }}">
                @csrf
                <span class="position-absolute ps-3 search-icon">
                    <i class="fe fe-search"></i>
                </span>
                <input type="search" name="name" class="form-control ps-6" placeholder="Tìm kiếm" required />
            </form>
        </div>
    </div>
</nav>
