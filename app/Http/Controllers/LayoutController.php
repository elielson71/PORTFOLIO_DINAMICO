<?php

namespace App\Http\Controllers;

use App\Http\Requests\LayoutRequest;
use App\Models\Layout;
use App\Models\LayoutSessao;
use App\Models\Sessao;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LayoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $layouts = Layout::all();
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
        Layout::create($request->all());
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
        $id = $layout->id;

        // $sessao = Sessao::whereDoesntHave('layout', function (Builder $query) {
        //     $query->where('layout_id',$id);
        // })->get();
        $idFilter = filter_var($id);
        $sessao = DB::select('select * from sessao s where s.id not in ( SELECT sessao_id from layout_sessao ls where ls.layout_id = ?)', [$idFilter]);

        $sessoesLayout = $layout->sessao()->orderByPivot('order_sessao')->get();
        $layout['sessoesLayout'] = $sessoesLayout;
        $layout['sessoes'] = $sessao;
        return view('\layout\edit')
            ->with('layout', $layout);
    }


    public function update(Layout $layout, LayoutRequest $request)
    {
        foreach($request->order as $key => $order){

            $ls = LayoutSessao::where('layout_id',$layout->id)->where('sessao_id',$order)->get();
            $layoutSessao = new  LayoutSessao();
            $array = $ls->toArray();
            $array[0]['order_sessao'] = $key;
            $layoutSessao->exists =true;
            $layoutSessao->update($array[0]);

        }
        $layout->fill($request->all());
        $layout->save();

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
