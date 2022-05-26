<?php

namespace App\Models;

use App\Models\Representant;
use App\Models\Fonctionnaire;
use App\Models\Ressortissant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DemandeAdhesion extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'adh_id';

    protected $fillable =[
        'num_contrat_adh',
        'num_recu',
        'date_debut',
        'date_fin',
        'periodicite',
        'res_id',
        'pack_id',
        'fonc_id',
        'rep_id',

    ];


    public function fonctionnaire() {
        return $this->belongsTo(Fonctionnaire::class, 'fonc_id');
    }

    public function representant() {
        return $this->belongsTo(Representant::class, 'rep_id');
    }
    
    public function ressortissant() {
        return $this->belongsTo(Ressortissant::class, 'res_id');
    }
    
}
