<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class page extends Model
{
    use HasFactory;

    protected $fillable = ['menu_id', 'content'];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
