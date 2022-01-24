<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MascotaResource extends JsonResource
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
           'nombre' => $this->nombre,
           'fecha' => $this->fecha,
           'especie' => $this->especie,
           'edad' => $this->edad,
           'vacunas' => VacunaResource::collection($this->vacunas)
        ];
    }
}
