<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Models\Book as Book;

class BookController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // Menampilkan list dari model
    public function index(){
         $books = Book::where('user_id', Auth::id())->get();

        return view('book', [
            'books' => $books
        ]);
    }

    public function create(){
        return view('create');
    }

    // menyimpan data baru ke tabel books
    public function store(Request $request){

        $validatedData = $request->validate([
            'isbn' => 'required|string|max:13|unique:books',
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'read_status' => 'required|in:read,reading,unread'
        ]);

        $validatedData['user_id'] = Auth::id();

        // CREATE
        $book = Book::create($validatedData);

        return redirect()->route('book.index');
    }

    public function edit($id){

        // READ
        $book = Book::findOrFail($id);

        return view('edit', [
            'book' => $book
        ]);

    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'isbn' => 'required',
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'read_status' => 'required|in:read,reading,unread',
        ]);

        $book = Book::findOrFail($id);
        $book->update($request->all());

        return redirect()->route('book.index')
            ->with('success', 'Book updated successfully');
    }

    public function delete($id){

        $book = Book::findOrFail($id); 

        // DELETE
        $book->delete();

        return redirect()->route("book.index");
    }
}
