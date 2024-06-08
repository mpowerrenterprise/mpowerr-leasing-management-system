@extends('layouts.Dashboard')

@section('headTitle', "Product Edit")
@section('headerText', 'Product Management Edit')

@section('centerContent')

<form action="{{ route('EditProductRoute', ['id' => $Product->id]) }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="p_name">Product Name</label>
        <input type="text" value="{{ $Product->p_name }}" class="form-control" id="p_name" name="p_name" placeholder="Enter Product Name" required>
    </div>
    <div class="form-group">
        <label for="s_rate">Selling Rate</label>
        <input type="text" value="{{ $Product->s_rate }}" class="form-control" id="s_rate" name="s_rate" placeholder="Enter Selling Rate" required>
    </div>
    <div class="form-group">
        <label for="b_rate">Buying Rate</label>
        <input type="number" value="{{ $Product->b_rate }}" class="form-control" id="b_rate" name="b_rate" placeholder="Enter Buying Rate" required>
    </div>
    <div class="form-group">
        <label for="p_id">Product ID</label>
        <input type="number" value="{{ $Product->p_id }}" class="form-control" id="p_id" name="p_id" placeholder="Enter Product ID" required>
    </div>
    <div class="form-group">
        <label for="p_quantity">Product Quantity</label>
        <input type="text" value="{{ $Product->p_quantity }}" class="form-control" id="p_quantity" name="p_quantity" placeholder="Enter Product Quantity" required>
    </div>
    <div class="form-group">
        <label for="p_model">Product Model</label>
        <input type="text" value="{{ $Product->p_model }}" class="form-control" id="p_model" name="p_model" placeholder="Enter Product Model" required>
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
</form>

@endsection
