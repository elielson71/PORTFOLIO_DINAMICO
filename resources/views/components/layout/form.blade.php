<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="{{ $action }}" method="POST">
                <div class="token">
                    @csrf
                </div>

                @isset($layout)
                @method('PUT')
                <input type="hidden" id="layout_id" value="{{$layout->id}}">
                <h5 class="diplay-5 " align="center">Editando Layout - {{$layout->titulo}}</h5>
                @empty(!old())
                @php
                $layout->fill(old());
                @endphp
                @endempty
                @endisset
                @php

                @endphp
                <div class="form-group">
                    <label for="titulo">Titulo Layout</label>
                    <input id="titulo" name="titulo" placeholder="Titulo" type="text" required="required" class="form-control" @isset($layout->titulo)value="{{$layout->titulo}}"@endisset >
                </div>

                @isset($layout)
                <div class="card" style="margin-top: 20px;">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="sessao" class="col-2 col-form-label">Sessão</label>
                            <div class="col-8">
                                <select id="sessao" name="sessao" class="form-select">
                                    @isset($layout)
                                    @foreach ($layout->sessoes as $sessao)
                                    <option value="{{$sessao->id}}">{{$sessao->titulo}}</option>
                                    @endforeach
                                    @endisset
                                </select>
                            </div>
                            <div class="col-2">
                                <button id="addsessaolayout" class="btn btn-success" url="{{route('layoutsessao.store')}}">
                                    add
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <br />
                <div id="listasessoes">
                    <x-layout.listas.ul :sessoesLayout="$layout->sessoesLayout" />
                </div>
                <br>

                @endisset
                <div class="form-group">
                    <a href="{{route('layout.index')}}" class="btn btn-primary">Voltar</a>
                    <button name="submit" type="submit" class="btn btn-success">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
