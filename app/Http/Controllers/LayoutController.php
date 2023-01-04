<?php

namespace App\Http\Controllers;

use App\Http\Requests\LayoutRequest;
use App\Models\Layout;
use App\Models\LayoutSessao;
use App\Services\LayoutService;


class LayoutController extends Controller
{
    /**
     * Serviço do Layout
     *
     * @var LayoutService
     */
    private $layoutService;

    public function __construct(LayoutService $layoutService)
    {
        $this->layoutService = $layoutService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $layouts = $this->layoutService->getAll();
        $mensagem =  session('message.sucesso');

        return view('\layout\index', ['layouts' => $layouts, 'mensagem' => $mensagem]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('\layout\create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LayoutRequest $request)
    {

        $this->layoutService->createLayout($request->all());
        return to_route('layout.index')->with('message.sucesso', "Layout '{$request->titulo}'Salva com Sucesso!");
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
    public function edit(Layout $layout)
    {
        $this->layoutService->getLayoutSessao($layout);
        return view('\layout\edit')
            ->with('layout', $layout);
    }


    public function update(Layout $layout, LayoutRequest $request)
    {

        $this->layoutService->getLayoutSessao($layout,$request);
        return to_route('layout.index')->with('message.sucesso', "Layout '{$request->titulo}' Atualizada com Sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Layout $layout)
    {
        $layout->delete();
        return to_route('layout.index')->with('message.sucesso', "Layout '{$layout->titulo}' Excluída com Sucesso!");
    }
}
