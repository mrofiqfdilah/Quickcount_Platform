<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suara extends Model
{
    protected $table = 'suara';
    protected $fillable = ['paslon_id', 'jumlah_suara', 'kabupaten','tps_id'];

    public function paslon()
    {
        return $this->belongsTo(Paslon::class);
    }
    
    public function tps()
    {
        return $this->belongsTo(TPS::class, 'tps_id');
    }
}

