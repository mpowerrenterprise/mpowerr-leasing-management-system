@extends('layouts.Dashboard')

@section('headTitle', "History")
@section('headerText', 'History')

@section('centerContent')

@if(session('success'))
    <div class="alert alert-success" id="success-message">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger" id="error-message">
        {{ session('error') }}
    </div>
@endif

<table class="table table-bordered" style="margin-top:50px;">
    <thead>
        <tr>
            <th>NIC No</th>
            <th>Product ID</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <!-- Loop through your data to populate the table rows -->
        @foreach($leases as $leases)
            <tr>
                <td>{{ $leases->nic_no }}</td>
                <td>{{ $leases->p_id }}</td>
                <td>{{ $leases->price }}</td>
                <td>
                    <!-- You can add action buttons or links here -->
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
@endsection
