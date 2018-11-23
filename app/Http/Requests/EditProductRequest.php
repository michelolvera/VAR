<?php
/*
    Request que se encarga de la validacion de datos para la edicion de producto.
*/
namespace ArticulosReligiosos\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
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
        /*
            Verifica que todos los parametros necesarios sean el tipo de valores correctos.
        */
        return [
            'name' => 'required|string|min: 5',
            'description' => 'required|string|min: 5',
            'price' => 'required|numeric|regex:/^\d+\.\d{2}$/',
            'discount_percent' => 'required|integer|min: 0|max: 100',
            'quantity' => 'required|integer|min: 1',
            'pictures' => 'array',
            'img_opt' => 'required|integer|min: 0|max: 2'
        ];
    }
}
