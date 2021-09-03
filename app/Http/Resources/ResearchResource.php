<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResearchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'status' => $this->status->name,
            'color' => $this->status->color,
            'content' => $this->content,
            'iprstatus' => $this->iprstatus->name,
            'classification' => $this->classification,
            'specialty' => $this->specialty,
            'iprstatus' => $this->iprstatus,
            'name' => $this->user->profile->firstname.' '.$this->user->profile->middlename.'. '.$this->user->profile->lastname,
            'email' => $this->user->email,
            'avatar' => $this->user->profile->avatar,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
