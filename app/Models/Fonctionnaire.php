<?php

namespace App\Models;

use App\Models\Service;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Fonctionnaire extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;
    protected $primaryKey = 'fonc_id';

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
}
