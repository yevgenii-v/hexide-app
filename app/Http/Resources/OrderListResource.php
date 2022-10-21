<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'        => $this->id,
            'title_ua'  => $this->title_ua,
            'title_en'  => $this->title_en,
            'description_ua' => $this->description_ua,
            'description_en' => $this->description_en,
            'price'     => $this->price,
            'quantity'  => $this->whenPivotLoaded('order_product', function () {
                return $this->pivot->quantity;
            }),
        ];
    }
}
