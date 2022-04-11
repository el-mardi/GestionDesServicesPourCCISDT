<?php

namespace App\Models;

use App\Models\Representant;
use App\Models\Ressortissant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Qualite extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'qualite_id';
    protected $fillable=[
        'qualite',
    ];

    public function representant () {
        return $this->hasMany(Representant::class, 'qualite_id');
    }

    public function ressortissant () {
        return $this->hasMany(Ressortissant::class, 'qualite_id');
    }
}
