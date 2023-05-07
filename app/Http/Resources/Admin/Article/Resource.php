<?php

namespace App\Http\Resources\Admin\Article;

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
            'city_id' => $this->city_id,
            'content' => $this->content,
            'tag' => $this->tag,
            'preview_text' => $this->preview_text,
            'cr_date' => $this->cr_date,
            'downloads' => $this->downloads
        ];
    }
}
