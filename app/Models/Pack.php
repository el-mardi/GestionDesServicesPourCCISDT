<?php

namespace App\Models;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pack extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'pack_id';

    protected $fillable = [
        'nom_pack',
        'code_pack',
        'tarif',
        'status',
    ];

    
    public function services() {
        return $this->belongsToMany(Service::class, 'details_services_packs', 'pack_id', 'service_id');
    }
}
