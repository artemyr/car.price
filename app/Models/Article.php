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

    public function images()
    {
        if (!empty($this->preview_image))
            $arrImages[] = asset('storage/'.$this->preview_image);

        foreach ($this->downloads as $image) {
            $arrImages[] = asset('storage/'.$image->path);
        }

        if (empty($arrImages))
            $arrImages[] = asset('img/article_placeholder.jpg');

        return $arrImages;
    }
}
