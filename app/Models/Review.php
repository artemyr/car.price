<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function getPreviewTextAttribute()
    {
        return mb_substr($this->content, 0, 150).'...';
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function downloads()
    {
        return $this->morphToMany(Download::class, 'downloadable');
    }
}
