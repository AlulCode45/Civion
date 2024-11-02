<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    protected $table = 'villages';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}