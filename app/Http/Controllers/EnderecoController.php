<?php

namespace App\Http\Controllers;

use App\Http\Requests\Endereco\SalvarRequest;
use App\Models\Endereco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EnderecoController extends Controller
{
    public function index()
    {
        $enderecos = Endereco::all();
        return view('listagem')->with(
            [
                'enderecos' => $enderecos,
            ]
        );
    }

    public function adicionar()
    {
        return view('busca');
    }

    public function buscar(
        Request $request
    ) {
        $cep = $request->input('cep');
        $response = Http::get("https://cep.awesomeapi.com.br/json/$cep")->json();
        //dd($response);

        return view('adicionar')->with(
            [
                'cep' => $request->input('cep'),
                'latitude' => $response['lat'],
                'longitude' => $response['lng'],
                'logradouro' => $response['address'],
                'bairro' => $response['district'],
                'cidade' => $response['city'],
                'estado' => $response['state'],
            ]
        );
    }

    public function salvar(
        SalvarRequest $request
    ) {
        $endereco = Endereco::where('cep', $request->input('cep'))->first();

        if (!$endereco) {
            Endereco::create(
                [
                    'cep' => $request->input('cep'),
                    'latitude' => $request->input('latitude'),
                    'longitude' => $request->input('longitude'),
                    'logradouro' => $request->input('logradouro'),
                    'numero' => $request->input('numero'),
                    'bairro' => $request->input('bairro'),
                    'cidade' => $request->input('cidade'),
                    'estado' => $request->input('estado'),
                ]
            );

            return redirect('/')->withSucesso('Endereço salvo com sucesso!');
        }

        return redirect('/')->withErro('O endereço já esta cadastrado!');
    }
}
