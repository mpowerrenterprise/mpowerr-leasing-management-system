@extends('layouts.Dashboard')

@section('headTitle',"Customer Edit")
@section('headerText', 'Customer Management')

@section('centerContent')

<form action="{{ route('EditCustomerRoute', ['id' => $Customer->id]) }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" value="{{$Customer->name}}" class="form-control" id="name" name="name" placeholder="Enter Name" required>
    </div>
    <div class="form-group">
        <label for="age">Age</label>
        <input type="" value="{{$Customer->age}}" class="form-control" id="age" name="age" placeholder="Enter Age" required>
    </div>
    <div class="form-group">
        <label for="mobile_no">Mobile No</label>
        <input type="number" value="{{$Customer->mobile_no}}" class="form-control" id="mobile_no" name="mobile_no" placeholder="Enter Mobile No" required>
    </div>
    <div class="form-group">
        <label for="gender">Gender</label>
        <select class="form-control" id="gender" name="gender" required>
            <option value="" disabled>Select Gender</option>
            <option value="male" {{ $Customer->gender == 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ $Customer->gender == 'female' ? 'selected' : '' }}>Female</option>
            <option value="other" {{ $Customer->gender == 'other' ? 'selected' : '' }}>Other</option>
        </select>
    </div>
    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="text" value="{{$Customer->email}}" class="form-control" id="email" name="email" placeholder="Enter E-mail" required>
    </div>
    <div class="form-group">
        <label for="grade">Grade</label>
        <input type="text" value="{{$Customer->grade}}" class="form-control" id="grade" name="grade" placeholder="Enter Grade" required>
    </div>
    <div class="form-group">
        <label for="nic_no">Nic No</label>
        <input type="text" value="{{$Customer->nic_no}}" class="form-control" id="nic_no" name="nic_no" placeholder="Enter Nic No" required>
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" value="{{$Customer->address}}" class="form-control" id="address" name="address" placeholder="Enter Address" required>
    </div>
    <button type="submit" class="btn btn-primary">Edite</button>
</form>

@endsection
