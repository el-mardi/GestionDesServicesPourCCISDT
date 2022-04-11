<?php

namespace App\Models;

use App\Models\Intervenant;
use App\Models\TypesIntervention;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Partenaire extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'part_id';

    protected $fillable = [
        'partenaire'
    ];
    
    public function intervenants () {
        return $this->hasMany(Intervenant::class, 'part_id');
    }
    
   
}
