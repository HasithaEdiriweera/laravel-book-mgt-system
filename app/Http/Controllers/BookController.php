<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\AuthorBook;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Book::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'isbn' => 'required',
            'publish_date' => 'required',
            'publisher' => 'required',
            'price' => 'required',
        ]);
        return Book::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Book::find($id);
    }

    
    public function getAllAuthorsByBook(Book $book)
    {
        $selectedBook = Book::find($book->id);
        $authors = $selectedBook->authors;
        return $authors;
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::find($id);
        $book->update($request->all());
        return $book;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Book::destroy($id);
    }

    /**
     * Search the specified resource from storage by title.
     */
    public function search(string $title)
    {
        return Book::where('title','like', '%'.$title.'%')->get();
    }

    public function addAuthorsToBook(Request $request, Book $book)
    {
        $data = $request->json()->all();
        $authorIds = $data['authorIds'];
        $bookAuthors = [];

        if (is_null($authorIds)) {
            return false;
        }
        foreach ($authorIds as $authorId) {
            $bookAuthors[] = [
                'book_id' => $book->id,
                'author_id' => $authorId,
            ];
        }
        $result = AuthorBook::insert($bookAuthors);

        return $result;
    }
}
