<?php

namespace App\DTOs;

class AuthorDto extends QueryDto
{
    public $id;
    public $name;
    public $email;
    public $phone_number;

    protected $fillable = [
        'id',
        'name',
        'email',
        'phone_number'
    ];
}