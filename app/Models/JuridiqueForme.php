<?php

namespace App\Models;

use App\Models\Ressortissant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JuridiqueForme extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'formeJur_id';

    protected $fillable = [
       'code_formeJur',
       'formeJur',
    ];
    
    public function ressortissant () {
        return $this->hasMany(Ressortissant::class, 'formeJur_id');
    }

}
