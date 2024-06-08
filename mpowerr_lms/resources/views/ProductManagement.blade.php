@extends('Layouts.Dashboard')

@section('headTitle',"Product")
@section('headerText', 'Product Management')

@section('centerContent')

@if(session('success'))
    <div class="alert alert-success" id="success-message">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger" id="error-message">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('RegisterProductRoute') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="p_name"> Product Name </label>
        <input type="text" class="form-control" id="p_name" name="p_name" placeholder="Enter Product Name" required>
    </div>
    <div class="form-group">
        <label for="s_rate">Selling Rate</label>
        <input type="text" class="form-control" id="s_rate" name="s_rate" placeholder="Enter Selling Rate" required>
    </div>
    <div class="form-group">
        <label for="b_rate">Buying Rate</label>
        <input type="number" class="form-control" id="b_rate" name="b_rate" placeholder="Enter Buying Rate" required>
    </div>
    <div class="form-group">
        <label for="p_id">Product ID</label>
        <input type="number" class="form-control" id="p_id" name="p_id" placeholder="Enter Product ID" required>
    </div>
    <div class="form-group">
        <label for="p_quantity">Product Quantity</label>
        <input type="text" class="form-control" id="p_quantity" name="p_quantity" placeholder="Enter Product Quantity" required>
    </div>
    <div class="form-group">
        <label for="p_model">Product Model</label>
        <input type="text" class="form-control" id="p_model" name="p_model" placeholder="Enter Product Model" required>
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
</form>

<table class="table table-bordered" style="margin-top:50px;">
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Selling Rate</th>
            <th>Buying Rate</th>
            <th>Product ID </th>
            <th>Product Quantity</th>
            <th>Product Model</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($Products as $Product)
        <tr>
            <td>{{ $Product->p_name }}</td>
            <td>{{ $Product->s_rate }}</td>
            <td>{{ $Product->b_rate }}</td>
            <td>{{ $Product->p_id }}</td>
            <td>{{ $Product->p_quantity }}</td>
            <td>{{ $Product->p_model }}</td>

        <td>
            <form action="{{ route('EditProductViewRoute', ['id' => $Product->id]) }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-success">Edit</button>
            </form>
            <form action="{{ route('DeleteProductRoute', ['id' => $Product->id]) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this Product?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach

        <!-- Add more rows with data here -->
    </tbody>
</table>



<script>
    window.onload = function(){

        $(document).ready(function(){
        // Wait for the document to be fully loaded

        setTimeout(function(){
            $('#success-message, #error-message').fadeOut('slow');
        }, 5000); // 500
    });

    }

</script>

@endsection

