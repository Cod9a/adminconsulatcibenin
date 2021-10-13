<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Enclosed extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = ['download_url'];

    public function getDownloadUrlAttribute()
    {
        return Storage::url($this->path);
    }
}
