<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller {

    // VIEWS

    public function index() {
        $books = Book::all();
        return view('home', compact('books'));
    }


    public function showAddBook(){
        return view('addBook');
    }



    public function showBookDetails($id) {
        $book = Book::getBookById($id);
        return view('bookDetails', compact('book'));
    }

    public function showEditBookDetails($id) {
        $book = Book::getBookById($id);
        return view('editBookDetails', compact('book'));
    }

    //CRUD

    public function addBook (Request $data) {
        $book = Book::saveBook($data->input('title'), $data->input('author'), $data->input('genre'), $data->input('publicationDate'), $data->input('description'));
        return view('newBookDetails', compact('book'));

    }

    public function updateBookDetails(Request $data) {
        $book = Book::updateBook($data->input('id'), $data->input('title'), $data->input('author'), $data->input('genre'), $data->input('publicationDate'), $data->input('description'));
        return view('bookDetails', compact('book'));
    }
}
