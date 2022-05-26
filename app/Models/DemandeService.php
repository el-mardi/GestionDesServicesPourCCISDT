<?php

namespace App\Models;

use App\Models\Service;
use App\Models\Representant;
use App\Models\Fonctionnaire;
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
        'type_demande',
        'date_debut',
        'date_fin',
        'province',
        'remarque',
        // 'duree',
        'res_id',
        'service_id',
        'fonc_id',
        'rep_id',

    ];

    // public function service() {
    //     return $this->belongsToMany(Service::class, 'service_id');
    // }
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
