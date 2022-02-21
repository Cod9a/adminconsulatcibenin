<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Demand;
use App\Models\DocumentForm;

class Meeting extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $with = ['user'];
    protected $casts = [
        'meeting_date' => 'datetime',
        'deleted' => 'boolean',
    ];
    protected $appends = [
        'meeting_date_formatted',
        'meeting_hour',
        'formatted_id',
        'date_demand_formatted'
    ];

    public function getMeetingDateFormattedAttribute()
    {
        return $this->meeting_date->format('d/m/Y');
    }

    public function getMeetingHourAttribute() {
        return $this->meeting_date->format('H:i');
    }

    public function getFormattedIdAttribute()
    {
        return str_pad($this->demand_id, 5, '0', STR_PAD_LEFT);
    }

    public function getDateDemandFormattedAttribute()
    {
        return $this->demand->created_at->format('Ymd');
    }

    public function demand()
    {
        return $this->belongsTo(Demand::class);
    }

    public function documentForm()
    {
        return $this->hasOne(DocumentForm::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
