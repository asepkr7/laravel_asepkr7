<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
   protected $guarded = ['id'];

    public function rumahSakit()
    {
        return $this->belongsTo(RumahSakit::class);
    }
}