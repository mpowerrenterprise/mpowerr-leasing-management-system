@extends('Layouts.Dashboard')

@section('headTitle',"Customers")
@section('headerText', 'Customers Management')

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


<form action="{{ route('RegisterCustomerRoute') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
    </div>
    <div class="form-group">
        <label for="age">Age</label>
        <input type="" class="form-control" id="age" name="age" placeholder="Enter Age" required>
    </div>
    <div class="form-group">
        <label for="mobile_no">Mobile No</label>
        <input type="number" class="form-control" id="mobile_no" name="mobile_no" placeholder="Enter Mobile No" required>
    </div>
    <div class="form-group">
        <label for="gender">Gender</label>
        <select class="form-control" id="gender" name="gender" required>
            <option value="" disabled selected>Select Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
    </div>
    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="Enter E-mail" required>
    </div>
    <div class="form-group">
        <label for="nic_no">Nic No</label>
        <input type="text" class="form-control" id="nic_no" name="nic_no" placeholder="Enter Nic No" required>
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required>
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
</form>

<table class="table table-bordered" style="margin-top:50px;">
    <thead>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Nic No</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($Customers as $Customer)
        <tr>
            <td>{{ $Customer->name }}</td>
            <td>{{ $Customer->age }}</td>
            <td>{{ $Customer->email }}</td>
            <td>{{ $Customer->gender }}</td>
            <td>{{ $Customer->address }}</td>
            <td>{{ $Customer->mobile_no }}</td>
            <td>{{ $Customer->nic_no }}</td>
            <td>
                <form action="{{ route('EditCustomerViewRoute', ['id' => $Customer->id]) }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-success">Edit</button>
                </form>
                <form action="{{ route('DeleteCustomerRoute', ['id' => $Customer->id]) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this Customer?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
        @endforeach
        <!-- Add more rows with data here -->
    </tbody>
</table>
@endsection
