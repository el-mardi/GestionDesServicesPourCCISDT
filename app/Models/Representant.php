<?php

namespace App\Models;

use App\Models\Qualite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Representant extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'rep_id';
    
    protected $fillable =[
        'cin',
        'nom',
        'prenom',
        'nationalite',
        'sexe',
        'tel',
        'mail',
        'adresse',
        'qualite_id',
    ];

    public function qualite () {
        return $this->belongsTo(Qualite::class, 'qualite_id');
    }
}
