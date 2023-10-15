@extends('layouts.master')
@section('title', 'Product List')

@section('content')
    <div class="container">
        <div class="main mt-3">
            <div class="d-flex align-items-center justify-content-between mb-5">
                <h3 class="text-black">Danh sách sản phẩm</h3>
                <div><a href="{{ route('product.create') }}" class="btn btn-primary">Thêm sản phẩm</a></div>
            </div>
            <div class="filter d-flex align-items-center justify-content-around mb-4">
                <select class="categoriesSelect form-select" aria-label="Default select example">
                </select>
                <div class="btn btn-outline-dark w-25 ml-2 productFilter">Lọc</div>
            </div>
            <div class="product-data">
                {{-- @include('products.productPagination') --}}
                <div class="no-product">

                </div>
                <table class="table table-striped product-table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Code</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Giá sản phẩm</th>
                            <th scope="col">Đơn vị tính</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Ngày cập nhật</th>
                            <th scope="col">Nhóm sản phẩm</th>
                            <th scope="col" class="" colspan="2">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>GPLGLY5R</td>
                            <td>Iphone</td>
                            <td>40.000.000</td>
                            <td>Cái</td>
                            <td>12-10-2023 00:00:00</td>
                            <td>Chưa cập nhật</td>
                            <td>Điện thoại</td>
                            <td><a href="" class="btn btn-info">Edit</a></td>
                            <td><a href="" class="btn btn-danger">Delete</a></td>
                        </tr>
                    </tbody>
                </table>
                <nav aria-label="...">
                    <ul class="pagination">
                        {{-- <li class="page-item paginationPrev"><span class="page-link">Previous</span></li>

                        <li class="page-item paginationNext"><span class="page-link">Next</span></li> --}}
                    </ul>
                </nav>
                {{-- @include('products.productPagination') --}}
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $(document).ready(function() {

            // Send get product request
            function getCategories() {
                $.ajax({
                    type: "GET",
                    url: "{{ route('category.list') }}",
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(categories) {
                        var content = '<option selected value="all">Tất cả sản phẩm</option>';

                        for (let i = 0; i < categories.length; i++) {
                            content += '<option value="' + categories[i].category_id + '">' +
                                categories[i].category_name + '</option>';
                        }
                        // Show categories
                        $('.categoriesSelect').html(content);
                    },
                    error: function() {
                        console.log("There was an error retrieving the category list!");
                    }
                })
            }
            getCategories();

            $(".productFilter").click(function(e) {
                e.preventDefault();
                let categoryId = $('.categoriesSelect').find(":selected").val();
                getProducts(1, categoryId);
            });

            // Send get product request
            function getProducts(page = 1, category = '') {
                $.ajax({
                    type: "GET",
                    url: "{{ route('product.list') }}?page=" + page + '&category=' + category,
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(products) {
                        var content = '';
                        if (products.data.length == 0) {
                            content =
                                '<h3 class="text-black d-flex align-items-center justify-content-center">Chưa có sản phẩm</h3>';

                            $('.product-table').addClass('d-none');
                            $('.pagination').addClass('d-none');
                            
                            $('.no-product').html(content);
                        } else {
                            $('.product-table').removeClass('d-none');
                            $('.pagination').removeClass('d-none');
                            $('.no-product').html('');
                            
                            for (let i = 0; i < products.data.length; i++) {
                                content += '<tr>';
                                content += '<th scope="row">' + products.data[i].product_id + '</th>'
                                content += '<td>' + products.data[i].product_code + '</td>'
                                content += '<td>' + products.data[i].product_name + '</td>'
                                content += '<td>' + products.data[i].product_price + '</td>'
                                content += '<td>' + products.data[i].product_unit + '</td>'
                                content += '<td>' + products.data[i].created_at + '</td>'
                                content += '<td>' + products.data[i].updated_at + '</td>'
                                content += '<td>' + products.data[i].category_name + '</td>'
                                content += '<td><a href="" class="btn btn-info disabled">Edit</a></td>'
                                content += '<td><a href="" class="btn btn-danger disabled">Delete</a></td>'
                                content += '</tr>';
                            }
                            // Show product and pagination
                            loadPagination(products.current_page, products.last_page);
                            $('tbody').html(content);
                            fectchpPaginationData(products.current_page, products.last_page)
                        }
                    },
                    error: function() {
                        console.log("There was an error retrieving the product list!");
                    }
                })
            }
            getProducts();

            // Load pagination
            function loadPagination(_currentPage, _lastPage) {
                const paginationContent = $('.pagination');
                let pagination = '';
                let prevDisabled = '';
                let nextDisabled = '';
                let currentPage = _currentPage;
                let lastPage = _lastPage

                for (let i = 1; i <= lastPage; i++) {
                    let isActive = '';
                    if (currentPage == 1) {
                        prevDisabled = 'disabled'
                    }
                    if (currentPage == lastPage) {
                        nextDisabled = 'disabled'
                    }
                    if (i == currentPage) {
                        isActive = 'active';
                    }

                    pagination += '<li class="page-item ' + isActive + '" data-page=' + i +
                        '><span class="page-link">' + i +
                        '</span></li>';
                }
                let paginationPrev = '<li class="page-item ' + prevDisabled +
                    '" data-page="prev"><span class="page-link">Previous</span></li>';
                let paginationNext = '<li class="page-item ' + nextDisabled +
                    '"data-page="next"><span class="page-link">Next</span></li>';

                $(paginationContent).html(paginationPrev + pagination + paginationNext);

            }

            // Get producut pagination data
            function fectchpPaginationData(_currentPage, _lastPage) {
                let currentPage = _currentPage;
                let lastPage = _lastPage
                $(".pagination li").on("click", function(e) {
                    e.preventDefault();
                    let _page = $(this).attr('data-page');
                    let _category = $('.categoriesSelect').find(":selected").val();
                    if (_page != 'prev' && _page != 'next') {
                        $(".pagination li").removeClass("active");
                        $(this).addClass("active");
                    }

                    if (currentPage > 1 && _page == 'prev') {
                        _page = parseInt(currentPage - 1);
                    }
                    if (currentPage < lastPage && _page == 'next') {
                        _page = parseInt(currentPage + 1);
                    }

                    if ($.isNumeric(_page) && currentPage >= 1 && currentPage <= lastPage) {
                        getProducts(_page, _category);
                    }
                });
            }


        });
    </script>
@stop
