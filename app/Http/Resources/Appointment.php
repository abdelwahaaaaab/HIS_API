<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Appointment extends JsonResource
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
            //'user_id' => $this->id,
            'Name' => $this->Name,
            'Email' => $this->Email,
            'Phone' => $this->Phone,
            'Dname' => $this->Dname,
            'Date' => $this->Date
        ];
    }
}
