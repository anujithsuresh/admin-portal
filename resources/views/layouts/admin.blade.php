<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body,
        html {
            height: 100%;
            margin: 0;
        }

        header,
        footer {
            position: fixed;
            left: 0;
            right: 0;
            z-index: 1030;
            background-color: #f8f9fa;
        }

        header {
            top: 0;
            height: 60px;
            border-bottom: 1px solid #dee2e6;
        }

        footer {
            bottom: 0;
            height: 50px;
            text-align: center;
            line-height: 50px;
            border-top: 1px solid #dee2e6;
        }

        .main-content {
            margin-top: 60px;
            /* height of header */
            margin-bottom: 50px;
            /* height of footer */
            height: calc(100vh - 110px);
            /* full height minus header and footer */
            overflow-y: auto;
        }

        .sidebar {
            background-color: #f1f1f1;
            height: 100%;
        }
    </style>
</head>

<body>

    <header>
        @include('layouts.header')
    </header>

    <div class="container-fluid main-content">
        <div class="row h-100">
            <div class="col-md-2 sidebar p-3">
                <h4>Admin</h4>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="{{ route('customers.index') }}" class="nav-link">Customers</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('invoices.index') }}" class="nav-link">Invoices</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('api.index') }}" class="nav-link">API Test</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-10 p-4">
                @yield('content')
            </div>
        </div>
    </div>

    <footer>
        @include('layouts.footer')
    </footer>

</body>

</html>