<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'title_ua'          => ['string', 'min:4', 'max:50'],
            'description_ua'    => ['string', 'min:4', 'max:500'],
            'title_en'          => ['string', 'min:4', 'max:50'],
            'description_en'    => ['string', 'min:4', 'max:500'],
            'price'             => ['numeric', 'min:1', 'max:99999']
        ];
    }
}
