<?php

namespace App\Http\Resources\Url;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UrlMinifiedResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'url' => url('to/' . dechex($this->id)),
        ];
    }
}
