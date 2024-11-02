<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provinces';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function regencies()
    {
        return $this->hasMany(Regency::class);
    }
}