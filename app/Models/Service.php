<?php

namespace App\Models;

use App\Models\Pack;
use App\Models\Intervenant;
use App\Models\Fonctionnaire;
use App\Models\DemandeService;
use App\Models\TypesIntervention;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'service_id';
    
    protected $fillable = [
        'code_service',
        'service',
        'description',
        // 'periodicite',
        'cible',
        'lieu_prestation',
        'tarif',
        'ressource_service',
        'etat_service',
        'motif_etat_service',
        'action_communication',
        'remarque',
        'documentation',
        'type_id',
        'resp_id',
    ];

    public function typesIntervention () {
        return $this->belongsTo(TypesIntervention::class, 'type_id');
    }

    public function fonctionnaire () {
        return $this->belongsTo(Fonctionnaire::class, 'resp_id');
    }

    public function packs() {
        return $this->belongsToMany(Pack::class, 'details_services_packs', 'service_id', 'pack_id');
    }

    // public function demandeService() {
    //     return $this->belongsToMany(DemandeService::class, 'service_id');
    // } USE PIVOT

    public function servicesIntervenants() {

        return $this->belongsToMany(Intervenant::class, 'details_services_intervenants', 'service_id','intervenant_id')->withPivot('satut', 'remarque');
        // ->using(DetailsServicesIntervenant::class);
    }
    
    // public function demandeAdhesion() {
    //     return $this->belongsToMany(demandeAdhesion::class, 'pivotTable', 'id', 'id');
    // }
}
