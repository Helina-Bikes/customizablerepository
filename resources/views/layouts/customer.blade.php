<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Portal</title>
    <!-- Bootstrap CSS (or any framework of your choice) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/customer.css') }}" rel="stylesheet"> <!-- Your custom CSS -->
</head>
<body>
    <!-- Header Section -->
    <header class="bg-primary text-white p-3">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h4 mb-0">Customer Portal</h1>
                <nav>
                    <a href="{{ route('customer.products') }}" class="text-white me-3">Products</a>
                    <a href="{{ route('customer.cart') }}" class="text-white me-3">Cart</a>
                    <a href="{{ route('customer.orders') }}" class="text-white">Orders</a>
                    <a href="{{ route('logout') }}" class="text-white ms-3">Logout</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content Section -->
    <main class="py-4">
        <div class="container">
            @yield('content') <!-- Content section for each page -->
        </div>
    </main>

    <!-- Footer Section -->
    <footer class="bg-dark text-white py-3">
        <div class="container text-center">
            <p>&copy; {{ date('Y') }} Your Company. All rights reserved.</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/customer.js') }}"></script> <!-- Your custom JS -->
</body>
</html>
