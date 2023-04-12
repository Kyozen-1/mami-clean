<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $table = 'profils';
    protected $guarded = 'id';

    public function pivot_profil_media_sosial()
    {
        return $this->hasMany('App\Models\PivotProfilMediaSosial', 'profil_id');
    }
}
