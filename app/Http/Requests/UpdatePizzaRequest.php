<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePizzaRequest extends FormRequest
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
            'name'=>'required|min:3|max:30',
            'description'=>'required',
            'small_pizza_price'=>'required|numeric',
            'medium_pizza_price'=>'required|numeric',
            'large_pizza_price'=>'required|numeric',
            'category'=>'required',
        ];
    }
}
