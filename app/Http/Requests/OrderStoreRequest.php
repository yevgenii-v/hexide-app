<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
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
            'user_id'                       => ['numeric', 'exists:users,id', 'required'],
            'receiver_address'              => ['string', 'max:70', 'required'],
            'orderProducts'                 => ['array'],
            'orderProducts.*.product_id'    => ['integer', 'exists:products,id', 'required'],
            'orderProducts.*.quantity'      => ['integer', 'min:1', 'max:100', 'required'],
        ];
    }
}
