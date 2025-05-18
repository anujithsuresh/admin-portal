@extends('layouts.admin')
@section('content')
<h2>Edit Invoice</h2>

<a href="{{ route('invoices.index') }}" class="btn btn-secondary mb-3">← Back</a>

@if($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{ route('invoices.update', $invoice->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Customer</label>
        <select name="customer_id" class="form-control" required>
            @foreach ($customers as $c)
            <option value="{{ $c->id }}" {{ $invoice->customer_id == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Date</label>
        <input type="date" name="date" class="form-control" value="{{ $invoice->date }}" required>
    </div>
    <div class="mb-3">
        <label>Amount</label>
        <input type="number" step="0.01" name="amount" class="form-control" value="{{ $invoice->amount }}" required>
    </div>
    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control">
            <option {{ $invoice->status == 'Unpaid' ? 'selected' : '' }}>Unpaid</option>
            <option {{ $invoice->status == 'Paid' ? 'selected' : '' }}>Paid</option>
            <option {{ $invoice->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
        </select>
    </div>
    <button class="btn btn-primary">Update</button>
</form>
@endsection