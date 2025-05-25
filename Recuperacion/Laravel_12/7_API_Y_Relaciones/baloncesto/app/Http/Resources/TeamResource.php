<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'city' => $this->city,
            'mascot' => $this->mascot,
            'founded' => $this->founded,
            'championships' => $this->championships,
            'players' => PlayerResource::collection($this->whenLoaded('players')),
        ];
    }
}
