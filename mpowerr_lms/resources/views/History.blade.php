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
        @foreach($leases as $lease)
            <tr>
                <td>{{ $lease->nic_no }}</td>
                <td>{{ $lease->p_id }}</td>
                <td>{{ $lease->price }}</td>
                <td>
                <form action="{{ route('DeleteLeasesRoute', ['id' => $lease->id]) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this History?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
