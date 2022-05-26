<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailsServicesIntervenant extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'service_intervenant_id';

    protected $fillable= [
        'service_id',
        'intervenant_id',
        'satut',
        'remarque',
    ];
}
