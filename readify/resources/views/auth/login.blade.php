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
                <div class="navbar-nav ms-auto">
                    <a class="btn btn-outline-primary btn-sm" href="/register">Sign Up</a>
                </div>
            </div>
        </nav>
    </header>

    <div class="d-flex align-items-center justify-content-center min-vh-100">
        <div class="card shadow-sm" style="width: 380px;">
            <div class="card-body p-4">
                <h1 class="h3 mb-3 fw-normal text-center">Log in</h1>

                <form action="/login" method="POST">
                    @csrf

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-floating mb-2">
                        <input
                            type="email"
                            class="form-control"
                            id="floatingInput"
                            placeholder="name@example.com"
                            name="email"
                            value="{{ old('email') }}"
                            required
                        />
                        <label for="floatingInput">Email address</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input
                            type="password"
                            class="form-control"
                            id="floatingPassword"
                            placeholder="Password"
                            name="password"
                            required
                        />
                        <label for="floatingPassword">Password</label>
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="1" name="remember" id="remember">
                        <label class="form-check-label" for="remember">
                            Remember me
                        </label>
                    </div>
                    <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>

                    <div class="text-center mt-3">
                        <small class="text-muted">Don't have an account? <a href="/register" class="link-primary">Sign up</a></small>
                    </div>
                </form>
            </div>
        </div>
    </div>

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