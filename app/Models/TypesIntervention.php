<?php

namespace App\Models;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypesIntervention extends Model
{
    use HasFactory;
    public $table = 'types_interventions';
    public $timestamps = false;
    protected $primaryKey = 'type_id';
    protected $fillable =[
        'type',
        'code_type',
        'remarque',
    ];

    public function services () {
        return $this->hasMany(Service::class, 'type_id');
    }
}
