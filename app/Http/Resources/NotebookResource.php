<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NotebookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "fio" => $this->fio,
            "company" => $this->company,
            "phone_number" => $this->phone_number,
            "email" => $this->email,
            "birthday" => $this->birthday,
            "photo" => $this->photo
        ];
    }
}
