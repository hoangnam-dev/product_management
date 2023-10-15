<div class="header">
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-danger">
        <div class="container">
            <a class="navbar-brand text-black" href="{{ route('product') }}">
                <h2 class="text-light text-uppercase">
                    Quản lý sản phẩm
                </h2>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
                {{-- <ul class="navbar-nav me-auto mb-2 mb-lg-0 fs-5">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Nhóm sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('product.list') }}">Sản phẩm</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-outline-light text-light" type="submit">
                        Search
                    </button>
                </form> --}}
                <span class="text-light">Admin</span>
            </div>
        </div>
    </nav>
</div>
