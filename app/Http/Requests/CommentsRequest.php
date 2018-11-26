<?php
/*
    Request que verifica si los datos de el formulario de categoria es correcto.
*/
namespace ArticulosReligiosos\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentsRequest extends FormRequest
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
        */
        return [
            'title' => 'required',
            'text' => 'required',
            'product_id' => 'required',
            'user_id' => 'required',
        ];
    }
}
