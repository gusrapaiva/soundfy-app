<?php

namespace App\Http\Controllers;

use App\Models\album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dados = album::all();
        $counter = $dados->count();

        return "Albuns: " . $counter . $dados . Response()->json([], Response::HTTP_NO_CONTENT);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dados = $request->all();

        $validarDados = Validator::make($dados, [
            "nome" => "required",
            "faixas" => "required",
            "id_artista" => "required",
        ]);

        if($validarDados->fails()){
            return "Dados inválidos" . $validarDados->error(true) . 500;;
        }

        $dadosCadastrar = Album::create($dados);
        if($dadosCadastrar)
        {
            return "Dados cadastrados com sucesso." . Response()->json([], Response::HTTP_NO_CONTENT);
        } else {
            return "Dados não cadastrados." . Response()->json([], Response::HTTP_NO_CONTENT);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dados = Album::find($id);

        if($dados)
        {
            return "Album encontrado com sucesso." . Response()->json([], Response::HTTP_NO_CONTENT);
        } else {
            return "Album não encontrado." . Response()->json([], Response::HTTP_NO_CONTENT);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $albuns = $request->all();

        $validarDados = Validator::make($albuns, [
            'nome' => 'required',
            'faixas' => 'required',
            'id_artista' => 'required',
        ]);

        if($validarDados->fails())
        {
            return "Dados inválidos" . $validarDados->error(true) . 500;
        }

        $album = Album::find($id);
        $album->nome = $albuns['nome'];
        $album->faixas = $albuns['faixas'];
        $album->id_artista = $albuns['id_artista'];
    
        if($album->save()) {
            return "Dados alterados com sucesso." . Response()->json([], Response::HTTP_NO_CONTENT);
        } else {
            return "Falha ao alterar dados." . Response()->json([], Response::HTTP_NO_CONTENT);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $album = album::find($id);

        if($album->delete())
        {
            return "Album deletado com sucesso." . Response()->json([], Response::HTTP_NO_CONTENT);
        } else {
            return "Falha ao deletar album." . Response()->json([], Response::HTTP_NO_CONTENT);
        }
    }
}
