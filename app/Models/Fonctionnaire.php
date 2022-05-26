<?php

namespace App\Models;

use App\Models\Service;
use App\Models\DemandeService;
use App\Models\DemandeAdhesion;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Fonctionnaire extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $primaryKey = 'fonc_id';
    public $timestamps = false;

    protected $fillable = [
        'username',
        'nom',
        'prenom',
        'mot_de_passe',
        'cin',
        'sexe',
        'admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'mot_de_passe',
    ];

    public function serviceResponsable (){
        return $this->hasMany(Service::class, 'resp_id');
    }
    public function demandeService (){
        return $this->hasMany(DemandeService::class, 'fonc_id');
    }
    public function demandeAdhesion (){
        return $this->hasMany(DemandeAdhesion::class, 'rep_id');
    }

    public function getAuthPassword(){
          return $this->attributes['mot_de_passe'];
    }
}
