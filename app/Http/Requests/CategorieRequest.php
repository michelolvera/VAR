<?php
/*
    Request que verifica si los datos de el formulario de categoria es correcto.
*/
namespace ArticulosReligiosos\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategorieRequest extends FormRequest
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
            Verificar que name sea requerido, tipo string y de minimo 4 caracteres
            Verificar que icon sea requerido y tipo string.
        */
        return [
            'name' => 'required|string|min: 4',
            'icon' => 'required|string',
            'css_color' => 'required|string',
        ];
    }
}
