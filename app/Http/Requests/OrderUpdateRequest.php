<?php

namespace App\Http\Requests;

use App\Models\Order;
use Illuminate\Foundation\Http\FormRequest;

class OrderUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'receiver_address'  => ['string', 'min:8', 'max:70'],
            'status'            => ['in:'.Order::STATUS_OPENED.','.Order::STATUS_CLOSED.','.Order::STATUS_CANCELED],
            'quantity'          => ['array'],
            'quantity.*'        => ['integer', 'min:1', 'max:100'],
        ];
    }
}
