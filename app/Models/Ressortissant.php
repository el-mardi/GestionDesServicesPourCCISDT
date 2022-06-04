<?php

namespace App\Models;

use App\Models\Domaine;
use App\Models\Qualite;
use App\Models\Secteur;
use App\Models\Activite;
use App\Models\DemandeService;
use App\Models\JuridiqueForme;
use App\Models\DemandeAdhesion;
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
        'date_rc',
        'lieu_rc',
        'id_f',
        'patente',
        'dernier_contrat_adh',
        'dernier_contrat_accom',
        'accompagnement', //vrai si le ressortissant a contrat d'accomp sinon  faux ;
        'secteur',
        'activite',
        // 'act_id',
        'num_carte',
        'activite_carte',

        'dom_id',
        'qualite_id',
        'formeJur_id',
        'remarque',
    ];

    public function activites () {
        return $this->belongsTo(Activite::class, 'act_id');
    }

    public function domaines () {
        return $this->belongsTo(Domaine::class, 'dom_id');
    }

    public function secteurs () {
        return $this->belongsTo(Secteur::class, 'secteur');
    }

    public function qualite () {
        return $this->belongsTo(Qualite::class, 'qualite_id');
    }

    public function juridiqueForme () {
        return $this->belongsTo(JuridiqueForme::class, 'formeJur_id');
    }
    
    public function demandeService (){
        return $this->hasMany(DemandeService::class, 'res_id');
    }

    public function demandeAdhesion (){
        return $this->hasMany(DemandeAdhesion::class, 'res_id');
    }
}
