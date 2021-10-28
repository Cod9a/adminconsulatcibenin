<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class WaitingQueueItem extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['meeting'];

    private static function computeCode() {
        $numberOfPeopleToday = static::whereDate('created_at', now())->count();
        $code = Str::padLeft((string) (($numberOfPeopleToday + 1) % 1000), 3, '0'); 
        $prefix = chr(intdiv($numberOfPeopleToday + 1, 1000)+65);
        return "$prefix-$code";
    }

    public static function boot() {
        parent::boot();
        static::creating(function ($item) {
            $item->code = static::computeCode();
        });
    }

    public function meeting() {
        return $this->belongsTo(Meeting::class);
    }
}
