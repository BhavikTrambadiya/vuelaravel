<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    protected $access_token;

    public function access_token($value)
    {
        $this->access_token = $value;
        return $this;
    }

    public function toArray($request)
    {
        $data =[
            'name'  => $this->name,
            'email' => $this->email,
            'point' => $this->point,
        ];

        if (isset($this->access_token)) {
            $data['access_token'] = $this->access_token;
        }

        return $data;
    }
}
