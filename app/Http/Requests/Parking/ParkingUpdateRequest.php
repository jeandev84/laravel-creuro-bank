<?php

namespace App\Http\Requests\Parking;

use Illuminate\Foundation\Http\FormRequest;

class ParkingUpdateRequest extends FormRequest
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
            'city' => 'required|max:255',
            'address_parking' => 'required'
        ];
    }
}
