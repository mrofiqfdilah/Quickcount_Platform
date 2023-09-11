<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paslon extends Model
{
    use HasFactory;
    protected $table = 'paslon';
    protected $guarded = ['id'];

    public function tps()
    {
        return $this->hasOne(Tps::class);
    }
    public function suara()
    {
        return $this->hasMany(Suara::class);
    }
}
