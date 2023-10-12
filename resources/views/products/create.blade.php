@extends('layouts.master')
@section('title', 'Product Create')

@section('content')
<div class="container">
    <div class="main mt-3">
        <h3 class="text-black">Add product</h3>
        <div id="notify">

        </div>
        <div class="create-form">
            <form id="productForm" name="productForm" class="form-horizontal">
                <div class="mb-3">
                    <label for="product_code" class="form-label">Product code</label>
                    <input type="text" class="form-control" id="product_code" placeholder="Enter product code...">
                </div>
                <div class="mb-3">
                    <label for="product_name" class="form-label">Product name</label>
                    <input type="text" class="form-control" id="product_name" placeholder="Enter product name...">
                </div>
                <div class="mb-3">
                    <label for="product_unit" class="form-label">Product units</label>
                    <select id="product_unit" class="form-select">
                        <option>Cái</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="product_price" class="form-label">Product price</label>
                    <input type="text" class="form-control" id="product_price" placeholder="Enter product price...">
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">Categoties</label>
                    <select id="category_id" class="form-select">
                        <option value="category_1">Category 1</option>
                        <option value="category_2">Category 2</option>
                        <option value="category_3">Category 3</option>
                    </select>
                </div>

                <button id="saveData" type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@stop
@section('scripts')
<script>
$(document).ready(function() {
    $('#saveData').click(function(e) {
        e.preventDefault();
        // var data = $('#productForm').serialize();
        var formData = {
            product_code: $('#product_code').val(),
            product_name: $('#product_name').val(),
            product_unit: $('#product_unit').find(":selected").val(),
            product_price: $('#product_price').val(),
            category_id: $('#category_id').find(":selected").val(),
        };
        console.log(formData);
        var notify = '';
        $.ajax({
            data: formData,
            url: "{{ route('product.store') }}",
            type: "POST",
            dataType: 'json',
            success: function(data) {
                notify =
                    '<div class="alert alert-success" role="alert">Thêm sản phẩm thành công!</div>';
                $('#notify').html(notify)
            },
            error: function(data) {
                console.log('Error:', data);
                notify =
                    '<div class="alert alert-danger" role="alert">Thêm sản phẩm không thành công!</div>';
                $('#notify').html(notify)
            }
        });
    });

});
</script>
@endsection