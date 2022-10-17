<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */

    public function toArray($request): array
    {
        return [
            'id'                => $this->id,
            'receiver_address'  => $this->receiver_address,
            'status'            => $this->status,
            'order_list'        => OrderListResource::collection($this->products),
        ];
    }
}
