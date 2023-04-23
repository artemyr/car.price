<?php

namespace App\Http\Resources\Admin\Post;

use Illuminate\Http\Resources\Json\JsonResource;

class Resource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'link' => $this->link,
            'content' => $this->content,
            'image' => $this->image,
            'category_id' => $this->category_id,
            'city_id' => $this->city_id,
        ];
    }
}
