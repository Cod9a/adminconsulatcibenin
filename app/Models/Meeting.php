<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'meeting_hour'
    ];

    public function getMeetingDateFormattedAttribute()
    {
        return $this->meeting_date->isoFormat('DD MMM YY - HH:mm');
    }

    public function getMeetingHourAttribute() {
        return $this->meeting_date->format('H:i');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
