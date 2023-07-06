<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class City extends Model
{
    use HasFactory;

    protected $table = 'cities';
    protected $guarded = false;

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function categories()
    {
        $categories = Category::where('city_id', $this->id)->orWhere('city_id', null)->get();

        $multi = [];
        foreach ($categories as $item) {
            if ($item->parent_id == null) $multi[] = $item;
        }

        foreach ($multi as &$item) {
            $item->subcategories = $categories->where('parent_id', $item->id);
        }

        return $multi;
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
