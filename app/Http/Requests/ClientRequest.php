<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Client;

class ClientRequest extends FormRequest
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
    	$estadosCivis = implode(',', array_keys(Client::ESTADOS_CIVIS));
    	
        return [
            'nome'=>'required|max:20',
        	'documento'=>'required',
        	'email'=>'required|email',
        	'telefone'=>'required',
        	'data_nasc'=>'required|date',
        	'estado_civil'=>"required|in:$estadosCivis",
        	'sexo'=>'required|in:m,f'
        ];
    }
}
