<?php

namespace App\Http\Controllers;

use App\Http\Requests\SessaoRequest;
use App\Models\Sessao;
use Illuminate\Http\Request;

class SessaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessoes = Sessao::all();
        $mensagem =  session('message.sucesso');

        return view('/sessao/listaSessao', ['sessoes' => $sessoes, 'mensagem' => $mensagem]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/sessao/CadastroSessao')
            ->with('action', route('sessao.salvar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SessaoRequest $request)
    {
        Sessao::create($request->all());
        return to_route('sessao.index')->with('message.sucesso', "Sessão '{$request->titulo}' Salva com Sucesso!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sessoes = Sessao::find($id);
        return view('/sessao/CadastroSessao')
            ->with('sessoes', $sessoes)
            ->with('action', route('sessao.atualizar',$id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\SessaoRequest  $request
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Sessao $sessaos,SessaoRequest $request)
    {

        $sessaos->fill($request->all());
        $sessaos->save();

        return to_route('sessao.index')->with('message.sucesso', "Sessão '{$request->titulo}' Atualizada com Sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sessao $sessao)
    {
        $sessao->delete();
        return to_route('sessao.index')->with('message.sucesso', "Sessão '{$sessao->titulo}' Excluída com Sucesso!");
    }
}
