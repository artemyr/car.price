<?php

namespace App\Http\Resources\Admin\Review;

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
            'author' => $this->author,
            'rate' => $this->rate,
            'cr_date' => $this->cr_date,
            'author_ava' => $this->author_ava,
            'city_id' => $this->city_id,
            'downloads' => $this->downloads
        ];
    }
}
