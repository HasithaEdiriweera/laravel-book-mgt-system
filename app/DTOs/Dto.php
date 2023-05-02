<?php

namespace App\DTOs;

class Dto
{
    public function __construct(array $attributes = [])
    {
        $this->fill($attributes);
    }
    public function toArray()
    {
        return (array) $this;
    }
    protected $fillable = [];

    public function fill(array $data)
    {
        foreach ($this->getFillable() as $key) {
            if (isset($data[$key])) {
                $this->$key = $data[$key];
            }
        }
        return $this;
    }
    public function getFillable()
    {
        return $this->fillable;
    }
}
