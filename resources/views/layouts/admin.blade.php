<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 bg-light min-vh-100 p-3">
                <h4>Admin</h4>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="{{ route('customers.index') }}" class="nav-link">Customers</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('invoices.index') }}" class="nav-link">Invoices</a>
                    </li>
                </ul>
            </div>

            <!-- Content -->
            <div class="col-md-10 p-4">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>