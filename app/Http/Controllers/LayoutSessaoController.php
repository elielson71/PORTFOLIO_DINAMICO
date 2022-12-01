<?php

namespace App\Http\Controllers;

use App\Http\Requests\LayoutRequest;
use App\Models\Layout;
use App\Models\LayoutSessao;
use App\Models\Sessao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LayoutSessaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $layout = Layout::find($request->layout_id);
        $layout->sessao()->attach($request->sessao_id);

        $layouts = $layout->sessao()->get();
        $sessao = DB::select('select id,titulo from sessao s where s.id not in ( SELECT sessao_id from layout_sessao ls where ls.layout_id = ?)', [$request->layout_id]);

        return  json_encode(['ul'=>''.view('\components\layout\listas\ul', ['sessoesLayout' => $layouts]).'','sessao'=>$sessao]);

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
    }


    public function update(Layout $layout, LayoutRequest $request)
    {
        $layout = Layout::find($request->layout_id);
        $layout->sessao()->updateExistingPivot($request->sessao_id);

        return json_encode(['code'=>200]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $layout = Layout::find($request->layout_id);
        $layout->sessao()->detach($request->sessao_id);

        $layouts = $layout->sessao()->get();
        $sessao = DB::select('select id,titulo from sessao s where s.id not in ( SELECT sessao_id from layout_sessao ls where ls.layout_id = ?)', [$request->layout_id]);

        return  json_encode(['ul'=>''.view('\components\layout\listas\ul', ['sessoesLayout' => $layouts]).'','sessao'=>$sessao]);
    }

}
