<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function downloads()
    {
        return $this->morphToMany(Download::class, 'downloadable');
    }

    public function picture()
    {
        return $this->belongsTo(Picture::class);
    }
}
