<?php

namespace App\Models;

use App\Models\School;
use App\Models\Domaine;
use App\Models\Memoire;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Departement extends Model
{
    use HasFactory;

    protected $table = "departements";

    protected $fillable = [ 
        'name',
        'description',
    ];

    public function memoire(){
        return $this->hasOne(Memoire::class);
    }
    public function school(){
        return $this->belongsTo(School::class);
    }
    public function domaine(){
        return $this->belongsTo(Domaine::class);
    }
}
