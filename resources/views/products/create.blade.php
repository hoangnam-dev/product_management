@extends('layouts.master')
@section('title', 'Product Create')

@section('content')
    <div class="container">
        <div class="main mt-3">
            <h3 class="text-black">Add product</h3>
            <div class="create-form">
                <form>
                    <div class="mb-3">
                        <label for="product_code" class="form-label">Product code</label>
                        <input type="text" class="form-control" id="product_code" placeholder="Enter product code...">
                    </div>
                    <div class="mb-3">
                        <label for="product_name" class="form-label">Product name</label>
                        <input type="text" class="form-control" id="product_name" placeholder="Enter product name...">
                    </div>
                    <div class="mb-3">
                        <label for="productUnitSelect" class="form-label">Product units</label>
                        <select id="productUnitSelect" class="form-select">
                            <option>Cái</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="product_price" class="form-label">Product price</label>
                        <input type="text" class="form-control" id="product_price" placeholder="Enter product price...">
                    </div>
                    <div class="mb-3">
                        <label for="categorySelect" class="form-label">Categoties</label>
                        <select id="categorySelect" class="form-select">
                            <option>Category 1</option>
                            <option>Category 2</option>
                            <option>Category 3</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@stop
