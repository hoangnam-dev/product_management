@extends('layouts.master')
@section('title', 'Product Create')

@section('content')
    <div class="container">
        <div class="main mt-3">
            <h3 class="text-black">Thêm sản phẩm</h3>
            <div id="notify">

            </div>
            <div class="create-form">
                <form id="productForm" name="productForm" class="form-horizontal">
                    <div class="mb-3">
                        <label for="product_code" class="form-label">Mã số (Là một chuỗi 4 ký tự, không chứa ký tự đặc biệt)</label>
                        <input type="text" class="form-control" name="product_code" id="product_code"
                            placeholder="Nhập mã số..." required>
                    </div>
                    <div class="mb-3">
                        <label for="product_name" class="form-label">Tên sản phẩm</label>
                        <input type="text" class="form-control" name="product_name" id="product_name"
                            placeholder="Nhập tên sản phẩm..." required>
                    </div>
                    <div class="mb-3">
                        <label for="product_unit" class="form-label">Đơn vị tính</label>
                        <select id="product_unit" class="form-select">
                            <option>Cái</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="product_price" class="form-label">Giá sản phẩm</label>
                        <input type="text" class="form-control" name="product_price" id="product_price"
                            placeholder="Nhập giá sản phẩm..." required>
                    </div>
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Nhóm sản phẩm</label>
                        <select id="category_id" class="form-select">
                        </select>
                    </div>

                    <button id="saveData" type="submit" class="btn btn-primary">Thêm sản phẩm</button>
                </form>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    <script>
        $(document).ready(function() {
            // Get list category
            function getCategories() {
                $.ajax({
                    type: "GET",
                    url: "{{ route('category.list') }}",
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(categories) {
                        var content = '';

                        for (let i = 0; i < categories.length; i++) {
                            content += '<option value="' + categories[i].category_id + '">' + categories[i]
                                .category_name + '</option>';
                        }
                        $('#category_id').html(content);
                    },
                    error: function() {
                        console.log("Have a error!");
                    }
                })
            }
            getCategories();

            // Submit form add new product
            $('#saveData').click(function(e) {
                e.preventDefault();
                validationFormData();
                var formData = {
                    product_code: $('#product_code').val(),
                    product_name: $('#product_name').val(),
                    product_unit: $('#product_unit').find(":selected").val(),
                    product_price: $('#product_price').val(),
                    category_id: $('#category_id').find(":selected").val(),
                };

                var notify = '';
                
                var productFormValid = $("#productForm").valid();
                if (productFormValid) {
                    $('#saveData').val('Đang thêm...')
                    $.ajax({
                        data: formData,
                        url: "{{ route('product.store') }}",
                        type: "POST",
                        dataType: 'json',
                        success: function(data) {
                            // reset form data
                            $('#product_code').val('');
                            $('#product_name').val('');
                            $('#product_price').val('');
                            $("#product_unit option").prop("selected", function() {
                                return this.defaultSelected;
                            });
                            $("#category_id option").prop("selected", function() {
                                return this.defaultSelected;
                            });

                            // Show result notify
                            let rs = 'success';
                            let msg = 'Thêm sản phẩm thành công!';
                            if(data != true) {
                                rs = 'danger';
                                msg = 'Thêm sản phẩm không thành công!';
                            }

                            notify = '<div class="alert alert-' + rs + '" role="alert">' + msg + '</div>';
                            $('#notify').html(notify)
                        },
                        error: function(error) {
                            console.log('Error:', error);
                            // Show result notify
                            notify = '<div class="alert alert-danger" role="alert">' + error.responseJSON.message + '</div>';
                            $('#notify').html(notify)
                        }
                    });
                }
            });

            // Validation form data
            function validationFormData() {
                $.validator.addMethod("validateCode", function(value, element) {
                    return this.optional(element) || /^([a-zA-Z0-9]{4})$/i.test(value);
                }, "Hãy nhập mã số có 4 ký tự và không chứa ký tự đặc biệt");
                $("#productForm").validate({
                    onfocusout: false,
                    onkeyup: false,
                    onclick: false,
                    rules: {
                        product_code: {
                            required: true,
                            validateCode: true,
                        },
                        product_name: {
                            required: true
                        },
                        product_price: {
                            required: true
                        },
                    },
                    messages: {
                        product_code: {
                            required: "Hãy nhập mã số sản phẩm"
                        },
                        product_name: {
                            required: "Hãy nhập tên sản phẩm"
                        },
                        product_price: {
                            required: "Hãy nhập giá sản phẩm"
                        },
                    }
                });
            }
        });
    </script>
@endsection
