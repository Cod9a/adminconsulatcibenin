<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = ['status', 'formatted_date'];

    public function document() {
        return $this->belongsTo(Document::class);
    }

    public function payment() {
        return $this->hasOne(Payment::class);
    }

    public function getStatusAttribute() {
        if ($this->payment === null) {
            return 'Non paye';
        } else if ($this->payment !== null) {
            return 'En attente';
        }
    }

    public function getFormattedDateAttribute() {
        return $this->created_at->format('d/m/Y');
    }
}
