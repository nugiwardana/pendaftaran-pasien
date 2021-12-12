<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poliklinik extends Model
{
    use HasFactory;

    protected $guarded = ['id_poliklinik'];
    public $table = "poliklinik";
    public $timestamps = false;
    protected $primaryKey = 'id_poliklinik';
}
