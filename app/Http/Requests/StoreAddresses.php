<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddresses extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'shipping_address.first_name' => 'required|max:255',
            'shipping_address.last_name' => 'required|max:255',
            'shipping_address.street_1' => 'required|max:255',
            'shipping_address.street_2' => 'required|max:255',
            'shipping_address.street_3' => 'required|max:255',
            'shipping_address.zip_code' => 'required|max:255',
            'shipping_address.city' => 'required|max:255',
            'shipping_address.country' => 'required|max:255',
            'billing_address.first_name' => 'required|max:255',
            'billing_address.last_name' => 'required|max:255',
            'billing_address.street_1' => 'required|max:255',
            'billing_address.street_2' => 'required|max:255',
            'billing_address.street_3' => 'required|max:255',
            'billing_address.zip_code' => 'required|max:255',
            'billing_address.city' => 'required|max:255',
            'billing_address.country' => 'required|max:255',
        ];
    }
}
