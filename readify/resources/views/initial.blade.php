<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Readify - Log in</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('resource/css/main.css')}}">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <a class="navbar-brand fw-bold" href="#">Readify</a>
            </div>
        </nav>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="hero mt-5 py-5">
            <div class="container pt-5">
                <div class="hero-content">
                    <h1>Welcome to Readify!</h1>
                    <p>Track your reading journey with Readify</p>
                </div>
            </div>
        </section>

        <!-- Section untuk mengarahkan ke halaman Book -->
        <section class="books-cta py-5">
            <div class="container text-center">
                <h2 class="mb-3">Explore your book collection</h2>
                <p class="mb-4">Let's register now if you don't have an account. And if you already have an account, let's login now!</p>
                <a href="/register" class="btn btn-primary btn-lg me-2">Register</a>
                <a href="{{ route('auth.login') }}" class="btn btn-outline-primary btn-lg">Login</a>
            </div>
        </section>
    </main>

    {{-- FOOTER --}}
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>About Readify</h5>
                    <p>Your personal book tracking companion</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>