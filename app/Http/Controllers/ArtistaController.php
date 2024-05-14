<?php

namespace App\Http\Controllers;

use App\Models\artista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ArtistaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dados = Artista::all();
        $counter = $dados->count();

        return "Artistas: " . $counter . $dados . Response()->json([], Response::HTTP_NO_CONTENT);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dados = $request->all();

        $validarDados = Validator::make($dados, [
            'nome' => 'required',
            'nacionalidade' => 'required',
            'gravadora' => 'required',
        ]);

        if($validarDados->fails()){
            return "Dados inválidos" . $validarDados->error(true) . 500;
        }

        $dadosCadastrar = Artista::create($dados);
        if($dadosCadastrar)
        {
            return "Dados cadastrados com sucesso" . Response()->json([], Response::HTTP_NO_CONTENT);
        } else {
            return "Dados não cadastrados" . Response()->json([], Response::HTTP_NO_CONTENT);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $artista = Artista::find($id);

        if($artista){
            return "Artista localizado." . $artista . Response()->json([], Response::HTTP_NO_CONTENT);
        } else {
            return "Artista não localizado." . Response()->json([], Response::HTTP_NO_CONTENT);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $artistas = $request->all();

        $validarDados = Validator::make($artistas, [
            'nome' => 'required',
            'nacionalidade' => 'required',
            'gravadora' => 'required',
        ]);

        if($validarDados->fails()) {
            return "Dados inválidos" . $validarDados->error(true) . 500;
        }

        $artista = Artista::find($id);
        $artista->nome = $artistas['nome'];
        $artista->nacionalidade = $artistas['nacionalidade'];
        $artista->gravadora = $artistas['gravadora'];

        if($artista->save()){
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
        $artista = Artista::find($id);
        
        if($artista->delete()){
            return "Artista deletado com sucesso" . Response()->json([], Response::HTTP_NO_CONTENT);
        } else {
            return "Falha ao deletar artista" . Response()->json([], Response::HTTP_NO_CONTENT);
        }
    }
}
