<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tps extends Model
{
    use HasFactory;
    protected $table = 'tps';
    protected $guarded = ['id'];

    public function relawan()
{
    return $this->hasMany(User::class, 'tps_id');
}
}
