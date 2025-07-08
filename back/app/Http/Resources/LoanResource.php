<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoanResource extends JsonResource
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
            'user_name' => $this->user?->name,
            'computer_id' => $this->computer_id,
            'start_at' => $this->start_at,
            'end_at' => $this->end_at,
            'loaner_name' => $this->loaner?->name,
        ];
    }
}
