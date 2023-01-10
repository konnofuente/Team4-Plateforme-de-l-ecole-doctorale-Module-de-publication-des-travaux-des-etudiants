<?php

namespace App\Models;

use App\Models\Memoire;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    use HasFactory;

    protected $table = "authors";

    protected $fillable = [ 
        'name',
        'email',
        'phone',
    ];
    public function memoires(){
        return $this->belongsToMany(Memoire::class);
    }
}
