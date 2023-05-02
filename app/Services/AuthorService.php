<?php

namespace App\Services;

use App\Interfaces\AuthorServiceInterface;
use App\DTOs\AuthorDto;
use App\Models\Author;
use App\Models\Book;
use App\Models\AuthorBook;

class AuthorService implements AuthorServiceInterface
{

    public function create(AuthorDto $request)
    {
        $author = new Author($request->toArray());
        $author->save();
    }
    public function getById(Author $author)
    {
        return $author;
    }
    public function getAll()
    {
        $authorQuery = Author::all();
        return $authorQuery;
    }

    public function getAllBooksByAuthor(Author $author)
    {
        $selectedAuthor = Author::find($author->id);
        $books = $selectedAuthor->books;
        return $books;
    }
    public function search(String $name)
    {
        return Author::where('name','like', '%'.$name.'%')->get();
    }
    public function delete(string $id)
    {
        Author::destroy($id);
    }
    public function update(Author $author, AuthorDto $request)
    {
        $author->name = $request->name;
        $author->email = $request->email;
        $author->phone_number = $request->phone_number;
        return $author->update();
    }

    public function addAuthorToBook(Author $author, $bookIds)
    {

        $authorBooks = [];

        if (is_null($bookIds)) {
            return false;
        }
        foreach ($bookIds as $bookId) {
            $authorBooks[] = [
                'author_id' => $author->id,
                'book_id' => $bookId,
            ];
        }
        $result = AuthorBook::insert($authorBooks);

        return $result;
    }

}
