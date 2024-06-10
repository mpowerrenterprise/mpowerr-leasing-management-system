@extends('layouts.Dashboard')

@section('headTitle', "Leasing")
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

<form action="{{ route('RegisterLeasesRoute') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nic_no">NIC No</label>
        <select class="form-control" id="nic_no" name="nic_no" required>
            <option selected disabled>Select NIC No</option>
            @foreach($customers as $customer)
                <option value="{{ $customer->nic_no }}">{{ $customer->nic_no }} - {{ $customer->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="p_id">Product ID</label>
        <select class="form-control" id="p_id" name="p_id" required>
            <option selected disabled>Select Product ID</option>
            @foreach($products as $product)
                <option value="{{ $product->id }}" data-price="{{ $product->s_rate }}">
                    {{ $product->id }} - {{ $product->p_name }} - Rs: {{ $product->s_rate }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" class="form-control" id="price" name="price" placeholder="Enter Price" required readonly>
    </div>
    <div class="form-group">
        <label for="installment">Installment</label>
        <input type="number" class="form-control" id="installment" name="installment" placeholder="Enter Installment" required>
    </div>
    <div class="form-group">
        <label for="m_due">Monthly Due</label>
        <input type="number" class="form-control" id="m_due" name="m_due" placeholder="Enter Monthly Due" required readonly>
    </div>
    <button type="submit" class="btn btn-primary">Lease</button>
</form>

<table class="table table-bordered" style="margin-top:50px;">
    <thead>
        <tr>
            <th>NIC No</th>
            <th>Product ID</th>
            <th>Price</th>
            <th>Installment</th>
            <th>Monthly Due</th>
            <th>Action</th>
        </tr>
    </thead>


<tbody>
    @foreach($leases as $lease)
        <tr>
            <td>{{ $lease->nic_no }}</td>
            <td>{{ $lease->p_id }}</td>
            <td>{{ $lease->price }}</td>
            <td>{{ $lease->installment }}</td>
            <td>{{ $lease->m_due }}</td>
            <td>

                <td>
                    <form action="{{ route('PayInstallmentRoute', ['id' => $lease->id]) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-primary">Pay Monthly Due</button>
                    </form>
                </td>

            <td>

        </tr>
    @endforeach
</tbody>
</table>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const productSelect = document.getElementById('p_id');
        const priceInput = document.getElementById('price');
        const installmentInput = document.getElementById('installment');
        const monthlyDueInput = document.getElementById('m_due');

        productSelect.addEventListener('change', function() {
            const selectedOption = productSelect.options[productSelect.selectedIndex];
            const price = selectedOption.getAttribute('data-price');
            priceInput.value = price ? price : '';
        });

        installmentInput.addEventListener('input', function() {
            const price = parseFloat(priceInput.value);
            const installment = parseInt(installmentInput.value);
            if (!isNaN(price) && !isNaN(installment) && installment > 0) {
                const monthlyDue = price / installment;
                monthlyDueInput.value = monthlyDue.toFixed(2);
            } else {
                monthlyDueInput.value = '';
            }
        });
    });
    </script>
@endsection
