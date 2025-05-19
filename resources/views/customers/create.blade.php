@extends('layouts.admin')

@section('content')


<h2 class="mb-4">Add New Customer</h2>

<a href="{{ route('customers.index') }}" class="btn btn-secondary mb-3">← Back to List</a>

@if($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{ route('customers.store') }}">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" name="phone" class="form-control">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control">
    </div>

    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <textarea name="address" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Save Customer</button>
</form>

@endsection
