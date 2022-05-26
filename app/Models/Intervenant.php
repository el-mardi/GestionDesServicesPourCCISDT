<?php

namespace App\Models;

use App\Models\Service;
use App\Models\Partenaire;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Intervenant extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'intervenant_id';

    protected $fillable = [
        'intervenant',
        'part_id',
    ];

    public function services() {
        return $this->belongsToMany(Service::class, 'details_services_intervenants', 'intervenant_id', 'service_id');
    }

    public function partenaire () {
        return $this->belongsTo(Partenaire::class, 'part_id');
    }

    public function intervenantsServices() {
        return $this->belongsToMany(Service::class, 'details_services_intervenants', 'intervenant_id', 'service_id')->withPivot('satut', 'remarque');
        // ->using(DetailsServicesIntervenant::class);
    }
}
