<?php

namespace App\Http\Requests\Endereco;

use Illuminate\Foundation\Http\FormRequest;

class SalvarRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        //dd($this->all());
        return [
            'cep' => 'required|string',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
            'logradouro' => 'required|string',
            'numero' => 'required|string',
            'bairro' => 'required|string',
            'cidade' => 'required|string',
            'estado' => 'required|string',
        ];
    }
}
