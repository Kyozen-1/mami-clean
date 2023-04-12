<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brosur extends Model
{
    protected $table = 'brosurs';
    protected $guarded = 'id';

    public function layanan()
    {
        return $this->belongsTo('App\Models\Layanan', 'layanan_id');
    }
}
