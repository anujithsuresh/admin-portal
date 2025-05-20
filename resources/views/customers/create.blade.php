@extends('layouts.admin')

@section('content')

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Add New Customer</h2>
        <a href="{{ route('customers.index') }}" class="btn btn-outline-secondary">
            ← Back to List
        </a>
    </div>

    @if($errors->any())
    <div class="alert alert-danger shadow-sm">
        <ul class="mb-0 ps-3">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form method="POST" action="{{ route('customers.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" placeholder="Enter customer name" required>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                    <input type="tel" name="phone" class="form-control" placeholder="Enter phone number" pattern="[0-9]{10}" maxlength="10" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control" placeholder="Enter email address" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                    <textarea name="address" class="form-control" rows="3" placeholder="Enter address" required></textarea>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i> Save Customer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection