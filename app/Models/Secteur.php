<?php

namespace App\Models;

use App\Models\Domaine;
use App\Models\Activite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Secteur extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'sect_id';
    protected $fillable = [
        'secteur',
    ];

    public function activites () {
        return $this->hasMany(Activite::class, 'sect_id');
    }
    public function domaines () {
        return $this->hasMany(Domaine::class, 'sect_id');
    }
}
