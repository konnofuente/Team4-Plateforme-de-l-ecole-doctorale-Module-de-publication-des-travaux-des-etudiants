<?php

namespace App\Models;

use App\Models\Author;
use App\Models\Departement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Memoire extends Model
{
    use HasFactory;

    protected $table = "memoires";

    protected $fillable = [ 
        'titre',
        'description',
        'date_soutenance',
        'couverture',
        'count_views',
        'count_download',
        'resume',
        'encadreur',
        'key_word',
    ];

    public function authors(){
        return $this->belongsToMany(Author::class);
    }
    public function departement(){
        return $this->belongsTo(Departement::class);
    }

}
