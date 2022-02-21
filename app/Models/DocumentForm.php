<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentForm extends Model
{
    use HasFactory;

    protected $appends = ['formatted_birthdate', 'formatted_date', 'formatted_id', 'formatted_date2'];

    public function getFormattedBirthdateAttribute() {
        return date('d/m/Y', strtotime($this->setAppends([])->birthdate));
    }

    public function getFormattedDateAttribute() {
        return $this->created_at->format('ymd');
    }

    public function getFormattedDate2Attribute() {
        return $this->created_at->format('d/m/Y');
    }

    public function getFormattedIdAttribute() {
        return str_pad($this->id, 5, '0', STR_PAD_LEFT);
    }

    public function demand()
    {
        return $this->belongsTo(Demand::class);
    }
}
