<?php
/*
    Request que verifica los datos necesarios para almacenar o editar una subcategoria.
*/
namespace ArticulosReligiosos\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubcategorieRequest extends FormRequest
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
            Verifica que el campo name sea requerido, tipo string y de minimo 4 caracteres.
            Verifica que categorie_id sea requerido, entero y su valor minimo sea 0.
        */
        return [
            'name' => 'required|string|min: 4',
            'categorie_id' => 'required|integer|min: 0',
        ];
    }
}
