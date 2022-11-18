<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{


    // show all books 
    public function index(Request $req){

        // this line is working, don't know why it is showing an error
        return view('books.index', [
            'books'=> auth()->user()->book()->latest()->filter(request(['genre', 'language', 'search']))->paginate(4)
        ]);
    }

    // show individual book
    public function show(Book $book, Request $req){
        // dd($req);
        return view('books.show', [
            'book' => $book,
        ]);
    }

    // show create form
    public function create(){
        return view('books.create');
    }

    // store  form
    public function store(Request $req){
        $formFields = $req->validate([
            'title' => 'required',
            'genre' => 'required',
            'language' => 'required',
            'description' => 'required',
        ]);
        if($req->hasFile('cover')){
            $formFields['cover'] = $req->file('cover')->store('cover', 'public');
        }
        $formFields['user_id'] = auth()->id();
        Book::create($formFields);

        return redirect('/');
    }

    // edit form 
    public function edit(Book $book, Request $req){
        // dd($req);
        return view('books.edit', ['book'=>$book]);
    }

    // update form data
    public function update(Book $book, Request $req){
       // dd($req);
       $formFields = $req->validate([
        'title' => 'required',
        'genre' => 'required',
        'language' => 'required',
        'description' => 'required',
        ]);
        if($req->hasFile('cover')){
            $formFields['cover'] = $req->file('cover')->store('cover', 'public');
        }

        // updating so using current parameter object
        $book->update($formFields);

    return back();
    }

    // delete book
    public function delete(Request $req, Book $book){
        $book->delete();
        return redirect('/');
    }
}
