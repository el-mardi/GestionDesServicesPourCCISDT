<?php

namespace App\Models;

use App\Models\Service;
use App\Models\Ressortissant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DemandeService extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'dem_serv_id';

    protected $fillable =[
        'num_contrat_accom',
        'date_debut',
        'date_fin',
        'duree',
        'province',
        'remarque',
        'res_id',
        'service_id',
        'fonc_id',
        'rep_id',

    ];

}
