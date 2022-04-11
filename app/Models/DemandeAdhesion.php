<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
