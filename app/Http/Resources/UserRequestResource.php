<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserRequestResource extends JsonResource
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
            'request_id'    => $this->id,
            'status'        => $this->status,
            'points'        => $this->points,
            'approvedate'   => isset($this->approvedate) ? $this->approvedate->format('d M Y') : '',
            'created_at'    => $this->created_at->format('d M Y'),
        ];
    }
}
