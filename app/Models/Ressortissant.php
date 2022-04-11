<?php

namespace App\Models;

use App\Models\Qualite;
use App\Models\Activite;
use App\Models\JuridiqueForme;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ressortissant extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'res_id';
    protected $attributes = [
        'accompagnement' => false,
    ];

    protected $fillable =[
        'num_fiche',
        'nom',
        'prenom',
        'cin',
        'nationalite',
        'adresse',
        'residence',
        'date_naissance',
        'sexe',
        'tel',
        'mail',
        'formation',
        'experience',
        'img',
        'raison_social',
        'ice',
        'rc',
        'patente',
        // 'anne_dernier_adh',
        'accompagnement', //vrai si le ressortissant a contrat d'accomp sinon  faux ;
        'secteur',
        'act_id',
        'qualite_id',
        'formeJur_id',
    ];

    public function activites () {
        return $this->belongsTo(Activite::class, 'act_id');
    }

    public function qualite () {
        return $this->belongsTo(Qualite::class, 'qualite_id');
    }

    public function juridiqueForme () {
        return $this->belongsTo(JuridiqueForme::class, 'formeJur_id');
    }
    
}
