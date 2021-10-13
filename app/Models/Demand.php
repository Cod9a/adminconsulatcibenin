<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = ['formatted_date'];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function encloseds()
    {
        return $this->hasMany(Enclosed::class);
    }

    public function getFormattedDateAttribute()
    {
        return $this->created_at->format('d/m/Y');
    }
}
