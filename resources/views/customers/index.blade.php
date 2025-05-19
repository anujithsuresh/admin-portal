@extends('layouts.admin')
@section('content')
<h2>Customers</h2>

<a href="{{ route('customers.create') }}" class="btn btn-success mb-3">+ Add Customer</a>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead class="table-dark">
        <tr class="text-center">
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($customers as $customer)
        <tr>
            <td>{{ $customer->id }}</td>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->phone }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->address }}</td>
            <td class="text-center">
                @if ($customer->invoices->count() > 0)
                <button class="btn btn-sm btn-secondary" disabled>Edit</button>
                <button class="btn btn-sm btn-secondary" disabled>Delete</button>
                @else
                <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-sm btn-primary">Edit</a>

                <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ route('admin') }}" class="btn btn-primary">Go to Admin Dashboard</a>

@endsection