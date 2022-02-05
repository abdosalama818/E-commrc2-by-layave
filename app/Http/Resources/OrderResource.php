<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'name'=>$this->name,
            'phone'=>$this->phone,
            'email'=>$this->email,
            'address'=>$this->address,
            'user_id' => $this->user_id,
            'status_of_order' => $this->status_of_order,
        ];
    }
}
