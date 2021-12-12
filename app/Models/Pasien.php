<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    
    public $table = "pasien";
    protected $guarded = ['id_pasien'];
    public $timestamps = false;
    protected $primaryKey = 'id_pasien';
}
