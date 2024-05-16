<?php

namespace App\Http\Controllers;

use App\Models\musica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;


class MusicaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dados = musica::all();
        $counter = $dados->count();

        return "Músicas: " . $counter . $dados . Response()->json([], Response::HTTP_NO_CONTENT);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dados = $request->all();

        $validarDados = Validator::make($dados, [
            "nome" => 'required',
            "tempo" => 'required',
            "id_artista" => 'required',
            "id_album" => 'required',
        ]);

        if($validarDados->fails()){
            return "Dados inválidos" . $validarDados->error(true) . 500;
        }

        $dadosCadastrar = Musica::create($dados);
        if($dadosCadastrar){
            return "Dados cadastrados com sucesso." . Response()->json([], Response::HTTP_NO_CONTENT);
        } else {
            return "Falha ao cadastrar dados." . Response()->json([], Response::HTTP_NO_CONTENT);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dados = Musica::find($id);

        if($dados){
            return "Música encontrada com sucesso." . Response()->json([], Response::HTTP_NO_CONTENT);
        } else {
            return "Música não existe." . Response()->json([], Response::HTTP_NO_CONTENT);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $musicas = $request->all();

        $validarDados = Validator::make($musicas, [
            'nome' => 'required',
            'tempo' => 'required',
            'id_artista' => 'required',
            'id_album' => 'required',
        ]);

        if($validarDados->fails()){
            return "Dados inválidos." . $validarDados->error(true) . 500;
        }

        $musica = Musica::find($id);
        $musica->nome = $musicas['nome'];
        $musica->tempo = $musicas['tempo'];
        $musica->id_artista = $musicas['id_artista'];
        $musica->id_album = $musicas['id_album'];

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $musica = musica::find($id);

        if($musica){
            return "Música encontrada com sucesso." . Response()->json([], Response::HTTP_NO_CONTENT);
        } else {
            return "Falha ao encontrar música." . Response()->json([], Response::HTTP_NO_CONTENT);

        }
    }
}
