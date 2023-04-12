<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $table = 'layanans';
    protected $guarded = 'id';

    public function brosur()
    {
        return $this->hasMany('App\Models\Brosur', 'layanan_id');
    }
}
