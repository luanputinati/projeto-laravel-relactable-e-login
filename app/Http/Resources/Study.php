<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Study extends JsonResource
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
            'id'            => $this->id,
            'description'   => $this->description,
            'date_init'     => $this->date_init,
            'date_finish'   => $this->date_finish,
            'status'        => $this->status,
            'area'          => new Area($this->area)
        ];
    }
}