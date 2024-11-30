<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name']; // Allow mass assignment for 'name'

    // Define the relationship if necessary
    public function articles()
    {
        return $this->hasMany(Article::class); // Assuming articles table has a category_id column
    }
}