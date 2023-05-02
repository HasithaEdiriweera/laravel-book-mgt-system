<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DTOs\AuthorDto;
use App\Models\Author;
use App\Models\Book;
use App\Interfaces\AuthorServiceInterface;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Gate;

class AuthorController extends Controller
{
    private AuthorServiceInterface $authorService;
    public function __construct(AuthorServiceInterface $authorService)
    {
        $this->authorService = $authorService;
    }
    /**
     * Display a listing of the resource.
     */

    public function getAuthors(Request $request){

        return $this->authorService->getAll();
    }

    public function getAllBooksByAuthor(Author $author){

        return $this->authorService->getAllBooksByAuthor($author);

    }

    /**
     * Show the form for creating a new resource.
     */
        public function createAuthor(Request $request){
        // Validation
        $request->validate([
            'name' => 'required|max:128',
            'email' => 'required',
            'phone_number' => 'required'
        ]);
        $author = new AuthorDto($request->toArray());

        return $this->authorService->create($author);
    }

    /**
     * Search a resource by name.
     */
    public function searchAuthorByName(string $name)
    {
        return $this->authorService->search($name);
    }

    /**
     * Display the specified resource.
     */
    public function getAuthorById( Author $author){

        return $this->authorService->getById($author);
    }

    /**
     * Update the specified resource in storage.
     */
     public function updateAuthor(Request $request, Author $author){
        // Validation
        $request->validate([
            'name' => 'required|max:128',
            'email' => 'required',
            'phone_number' => 'required'
        ]);

        $newAuthor = new AuthorDto($request->toArray());
        return $this->authorService->update($author, $newAuthor);
    }


    public function addBooksToAuthor(Request $request, Author $author)
    {
        $data = $request->json()->all();
        $bookIds = $data['bookIds'];
        return $this->authorService->addAuthorToBook($author, $bookIds);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteAuthor(string $id){

        return $this->authorService->delete($id);
    }
}
