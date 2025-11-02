<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Readify - Edit Book</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('resource/css/main.css')}}">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <a class="navbar-brand fw-bold" href="#">Readify</a>
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="/dashboard">Dashboard</a>
                    <form action="{{ route('auth.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-delete">Logout</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <main class="container py-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title mb-4">Edit Book</h1>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('book.update', $book->id) }}" method="POST"> 
                            @csrf
                            @method('POST') {{-- Pastikan method POST --}}
                            <div class="mb-3">
                                <label class="form-label">ISBN</label>
                                <input type="text" class="form-control" name="isbn" value="{{ old('isbn', $book->isbn) }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" value="{{ old('title', $book->title) }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Author</label>
                                <input type="text" class="form-control" name="author" value="{{ old('author', $book->author) }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Publisher</label>
                                <input type="text" class="form-control" name="publisher" value="{{ old('publisher', $book->publisher) }}" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Read Status</label>
                                <select class="form-select" name="read_status" required>
                                    <option value="read" {{ old('read_status', $book->read_status) == 'read' ? 'selected' : '' }}>Read</option>
                                    <option value="reading" {{ old('read_status', $book->read_status) == 'reading' ? 'selected' : '' }}>Reading</option>
                                    <option value="unread" {{ old('read_status', $book->read_status) == 'unread' ? 'selected' : '' }}>Unread</option>
                                </select>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('book.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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