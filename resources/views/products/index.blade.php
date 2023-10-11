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
            </div>
        </div>
    </div>
@stop
