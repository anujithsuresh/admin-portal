@extends('layouts.admin')
@section('content')
<h2 class="mb-4">Add Invoice</h2>

<a href="{{ route('invoices.index') }}" class="btn btn-secondary mb-3">← Back to Invoices</a>

@if($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{ route('invoices.store') }}">
    @csrf
    <div class="mb-3">
        <label>Customer</label>
        <select name="customer_id" class="form-control" required>
            <option value="">-- Select Customer --</option>
            @foreach ($customers as $c)
            <option value="{{ $c->id }}">{{ $c->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Date</label>
        <input type="date" name="date" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Amount</label>
        <input type="number" step="0.01" name="amount" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control" required>
            <option>Unpaid</option>
            <option>Paid</option>
            <option>Cancelled</option>
        </select>
    </div>
    <button class="btn btn-primary">Add Invoice</button>
</form>
@endsection