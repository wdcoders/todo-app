<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            "id"=> $this->id,
            "title"=> $this->name,
            "slug"=> $this->slug,
            "created_by"=> $this->created_by,
            "updated_by"=> $this->updated_by,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at
        ];
    }
}
