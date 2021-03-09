<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Book;
use App\Category;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = DB::table('book')
        -> select('book.isbn', 'book.title', 'book.author', 'book.publisher', 'book.description', 'book.cover', 'book.category_id', 'category.id', 'category.name')
        -> join('category', 'book.category_id', '=', 'category.id')
        -> get();
        $category = Category::all();
        return view('book.index', ['book' => $book], ['category' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = new Book;
        $book->isbn = $request->txtIsbn;
        $book->title = $request->txtTitle;
        $book->author = $request->txtAuthor;
        $book->publisher = $request->txtPublisher;
        $book->description = $request->txtDescription;
        $book->category_id = $request->categoryId;
    
        if ($request->hasFile('cover')) {
            $image = $request->file('cover');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/');
            $image->move($destinationPath, $name);
            $book->cover = $name;
        } else {
            $book->cover = null;
        }

        $book->save();
 
        return redirect('/book')->with('status', 'Book Input Success');
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $category = Category::all();
        return view('book.edit', compact('book','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {

        if ($request->hasFile('cover')) {
            $image = $request->file('cover');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/');
            $image->move($destinationPath, $name);
            $book->cover = $name;
        } else {
            $book->cover = null;
        }

        Book::where('isbn', $book->isbn)

                ->update([
                    'isbn' => $request->txtIsbn,
                    'title' => $request->txtTitle,
                    'author' => $request->txtAuthor,
                    'publisher' => $request->txtPublisher,
                    'description' => $request->txtDescription,
                    'category_id' => $request->categoryId,
                    'cover' => $book->cover
                ]);

        return redirect('/book')->with('status', 'Book Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        Book::destroy($book->isbn);
        return redirect('/book')->with('status', 'Book Deleted');
    }
}
