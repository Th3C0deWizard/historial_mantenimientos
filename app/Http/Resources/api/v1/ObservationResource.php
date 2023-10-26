<?php

namespace App\Http\Resources\api\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ObservationResource extends JsonResource
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
            'category' => $this->category->name,
            'message' => $this->message,
            'created_by' => $this->createdBy->name,
            'computer' => $this->computer->name,
            'creation_date' => $this->created_at,
            'updated_date' => $this->updated_at,
        ];
    }
}
