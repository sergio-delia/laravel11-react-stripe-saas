<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FeatureResource extends JsonResource
{

    public static $wrap = false; // Questa proprietà non avvolge i dati in un ulteriore wrap (es: data[ [ 'id' = 1]] , ma semplicemente [id => 1])
    /**
     *
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'image' => $this->image ?: null,
            'route_name' => $this->route_name,
            'name' => $this->name,
            'description' => $this->description,
            'required_credits' => $this->required_credits,
            'active' => $this->active
        ];
    }
}
