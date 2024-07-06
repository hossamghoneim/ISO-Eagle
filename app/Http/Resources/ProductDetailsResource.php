<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductDetailsResource extends JsonResource
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
            'category' => $this->category->name,
            'name' => $this->name,
            'features' => FeatureResource::collection($this->features),
            'images' => ProductImageResource::collection($this->productImages),
            'description' => $this->description,
            'structure_image' => $this->full_structure_image_path,
            'panel_image' => $this->full_panel_image_path,
        ];
    }
}
