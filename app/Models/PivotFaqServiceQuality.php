<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PivotFaqServiceQuality extends Model
{
    protected $table = 'pivot_faq_service_qualities';
    protected $guarded = 'id';

    public function service_quality()
    {
        return $this->belongsTo('App\Models\ServiceQuality', 'service_quality_id');
    }
}
