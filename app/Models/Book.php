<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'author', 'genre_id', 'publication_year'];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
