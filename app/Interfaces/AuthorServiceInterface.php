<?php

namespace App\Interfaces;

use App\DTOs\AuthorDto;
use App\Models\Author;
use App\Models\Book;

interface AuthorServiceInterface
{
    public function create(AuthorDto $request);
    public function getById(Author $author);
    public function search(String $name);
    public function getAll();
    public function getAllBooksByAuthor(Author $author);
    public function delete(string $id);
    public function update(Author $author, AuthorDto $request);
    public function addAuthorToBook(Author $author, $array);
}
