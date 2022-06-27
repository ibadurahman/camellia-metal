<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'workorder_id',
        'total_runtime',
        'total_downtime',
        'total_pcs',
        'total_pcs_good',
        'total_pcs_bad',
        'total_weight_fg',
        'total_weight_bb',
        // 'average_speed'
    ];

    public function workorder()
    {
        return $this->belongsTo(Workorder::class);
    }
}
