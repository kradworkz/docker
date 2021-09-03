<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'comment' => $this->comment,
            'user' => $this->user->profile->firstname.' '.$this->user->profile->lastname,
            'avatar' => $this->user->profile->avatar,
            'subcomments' => CommentResource::collection($this->comments),
            'likes' => $this->likes,
            'created_at' => $this->created_at
        ];
    }
}
