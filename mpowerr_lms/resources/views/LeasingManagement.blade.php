@extends('Layouts.Dashboard')

@section('headTitle',"Leasing")
@section('headerText', 'Leasing Management')

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

<form action="" method="POST">
    @csrf
    <div class="form-group">
        <label for="firstName">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
    </div>
    <div class="form-group">
        <label for="lastName">Age</label>
        <input type="text" class="form-control" id="age" name="age" placeholder="Enter Age" required>
    </div>
    <div class="form-group">
        <label for="age">Mobile No</label>
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
        <label for="age">E-mail</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="Enter E-mail" required>
    </div>
    <div class="form-group">
        <label for="grade">Grade</label>
        <input type="text" class="form-control" id="grade" name="grade" placeholder="Enter Grade" required>
    </div>
    <div class="form-group">
        <label for="firstName">Nic No</label>
        <input type="text" class="form-control" id="nic_no" name="nic_no" placeholder="Enter Nic No" required>
    </div>
    <div class="form-group">
        <label for="lastName">Address</label>
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
            <th>Mobile No</th>
            <th>Gender</th>
            <th>Grade</th>
            <th>Nic No</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
    </thead>

        <!-- Add more rows with data here -->
    </tbody>
</table>

@endsection
