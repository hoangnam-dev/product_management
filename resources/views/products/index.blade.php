@extends('layouts.master')
@section('title', 'Product List')

@section('content')
    <div class="container">
        <div class="main mt-3">
            <h3 class="text-black">Danh sách sản phẩm</h3>
            <div><a href="{{ route('product.create') }}" class="btn btn-info">Thêm sản phẩm</a></div>
            <div class="list">
                <table class="table table-striped">
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
                        {{-- <tr>
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
                        </tr> --}}
                    </tbody>
                </table>
                <nav aria-label="...">
                    <ul class="pagination">
                        <li class="page-item disabled">
                            <span class="page-link">Previous</span>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active" aria-current="page">
                            <span class="page-link">2</span>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $(document).ready(function() {
            // alert('oke');
            // Gửi yêu cầu GET đến đường dẫn /api/product/list
            function getProducts() {
                $.ajax({
                    type: "GET",
                    url: "{{ route('product.list') }}",
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(products) {
                        // console.log(products.data);
                        console.log(products.data.length);

                        var content = '';

                        for (let i = 0; i < products.data.length; i++) {
                            content += '<tr>';
                            content += '<th scope="row">' + products.data[i].id + '</th>'
                            content += '<td>' + products.data[i].product_code + '</td>'
                            content += '<td>' + products.data[i].product_name + '</td>'
                            content += '<td>' + products.data[i].product_price + '</td>'
                            content += '<td>' + products.data[i].product_unit + '</td>'
                            content += '<td>' + products.data[i].created_at + '</td>'
                            content += '<td>Chưa cập nhật</td>'
                            content += '<td>Điện thoại</td>'
                            content += '<td><a href="" class="btn btn-info">Edit</a></td>'
                            content += '<td><a href="" class="btn btn-danger">Delete</a></td>'
                            content += '</tr>';
                        }
                        $('tbody').html(content);
                    },
                    error: function() {
                        console.log("Have a error!");
                    }
                })
            }
            getProducts();
        });
    </script>
@stop
