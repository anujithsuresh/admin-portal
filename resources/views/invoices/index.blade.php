@extends('layouts.admin')
@section('content')
<h2>Invoices</h2>

<a href="{{ route('invoices.create') }}" class="btn btn-success mb-3">+ Add Invoice</a>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead class="table-dark">
        <tr class="text-center">
            <th>ID</th>
            <th>Customer</th>
            <th>Date</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($invoices as $invoice)
        <tr>
            <td>{{ $invoice->id }}</td>
            <td>{{ $invoice->customer->name }}</td>
            <td>{{ $invoice->date }}</td>
            <td>{{ $invoice->amount }}</td>
            <td>{{ $invoice->status }}</td>
            <td class="text-center">
                <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-sm btn-primary">Edit</a>

                <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection