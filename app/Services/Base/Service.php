<?php

namespace App\Services\Base;

class Service
{
    public function dividedCities ($cities)
    {
        $dividedCities = array();
        $col = 0;
        $row = 0;
        foreach ($cities as $item){
            $dividedCities[$row][$col] = [
                    'id' => $item->id,
                    'name' => $item->name,
                    'link' => $item->link,
                ];
            if($col >= 12){
                $col = 0;
                $row++;
            }
            $col++;
        }
        return $dividedCities;
    }

    public function freshCategories ($categories)
    {
        $tmp_cats = [];

        foreach($categories as $key => $category){
            if ($category->rel != null){
                $tmp_cats[$category->rel][] = $category;
                unset($categories[$key]);
            }
        }

        foreach($categories as $key => $category){
            if (isset($tmp_cats[$category->id])){
                $categories[$key]->setSubcategory($tmp_cats[$category->id]);
            }
        }

        return $categories;
    }
}