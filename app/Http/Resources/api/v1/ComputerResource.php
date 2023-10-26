<?php

namespace App\Http\Resources\api\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ComputerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'code' => $this->id,
            'name' => $this->name,
            'computer_brand' => $this->brand,
            'ram_capacity' => $this->ram,
            'cpu_brand' => $this->cpu,
            'registered_by' => $this->registered_by,
            'creation_date' => $this->created_at,
        ];
    }
}
