<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailsServicesPack extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $primaryKey = 'service_pack_id';
}
