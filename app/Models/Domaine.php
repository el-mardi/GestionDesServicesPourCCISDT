<?php

namespace App\Models;

use App\Models\Secteur;
use App\Models\Ressortissant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Domaine extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'dom_id';

    protected $fillable = [
        'domaine',
        'sect_id',
    ];

    public function secteur () {
        return $this->belongsTo(Secteur::class, 'sect_id');
    }

    public function ressortissant () {
        return $this->hasMany(Ressortissant::class, 'sect_id');
    }
}
