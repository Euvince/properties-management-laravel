<?php

namespace App\Http\Resources\Property;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property Property $resource
 */
class PropertyResource extends JsonResource
{

    public static $wrap = 'property';

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /* return parent::toArray($request); */

        return [
            'id' => $this->resource->id,
            'title' => $this->resource->title,
            /* 'price' => $this->when(true, $this->resource->price), */
            /* $this->mergeWhen(true, [
                'price' => $this->resource->price,
                'surface' => $this->resource->surface
            ]), */
            /* 'rooms' => $this->whenNotNull($this->resource->deleted_at), */
            'options' => OptionResource::collection($this->whenLoaded('options'))
        ];
    }
}
