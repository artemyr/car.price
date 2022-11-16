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
                    'title' => $item->title,
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
}
