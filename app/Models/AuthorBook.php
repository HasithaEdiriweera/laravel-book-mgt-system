<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorBook extends Model
{
    use HasFactory;
    protected $table = 'author_book';
    protected $fillable = ['author_id', 'book_id'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
