<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceQuality extends Model
{
    protected $table = 'service_qualities';
    protected $guarded = 'id';

    public function pivot_faq_service_quality()
    {
        return $this->hasMany('App\Models\PivotFaqServiceQuality', 'service_quality_id');
    }
}
