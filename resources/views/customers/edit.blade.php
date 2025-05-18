@extends('layouts.admin')
@section('content')
<h2>Edit Customer</h2>

<a href="{{ route('customers.index') }}" class="btn btn-secondary mb-3">← Back</a>

@if($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{ route('customers.update', $customer->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $customer->name }}" required>
    </div>
    <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control" value="{{ $customer->phone }}">
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ $customer->email }}">
    </div>
    <div class="mb-3">
        <label>Address</label>
        <textarea name="address" class="form-control">{{ $customer->address }}</textarea>
    </div>
    <button class="btn btn-primary">Update</button>
</form>
@endsection