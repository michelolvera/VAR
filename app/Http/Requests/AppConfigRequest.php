<?php

namespace ArticulosReligiosos\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppConfigRequest extends FormRequest
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
            'store_name' => 'required|string|min: 3',
            'carousel_products' => 'required|min: 5|integer',
            'ramdom_products' => 'required|min: 4|integer',
            'products_per_page' => 'required|min: 12|integer',
            'store_logo' => 'nullable|image',
            'nav_materialize_color' => 'required|string',
            'side_background' => 'required|string',
        ];
    }
}
