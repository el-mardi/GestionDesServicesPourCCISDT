<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailsCertifictOrigine extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_num_contrat',
        'exportateur',
        'remarque',
        'num_facture',
        'date_facture',
        'destinataire',
        'quantite',
        'details',
        'nomenclature',
        'transport',
        'pays_or',
    ];
}
