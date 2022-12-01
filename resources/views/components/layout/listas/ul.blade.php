<style>
    #accordion-sessions {
        padding: 4px 0;
        border: 1px dotted #bbb;
    }

    .item {
        padding: 8px;
    }
</style>
@isset($sessoesLayout)
@if (count($sessoesLayout)!=0)
<div class="card">
    <ul class="list-group list-group-flush sessions">
        @foreach ($sessoesLayout as $key => $s)
        <input type="hidden" id="id_sessao_list" value="{{$s->id}}">
        <li class="list-group-item d-flex">
            <h2 class="p-2 flex-grow-1">
                {{$s->titulo}}
            </h2>
            <div class="d-flex justify-content-between">
                <div>
                    <a href="{{route('sessao.editar',$s->id)}}" class="btn btn-primary p-2">Editar</a>
                </div>
                <div>
                    <a class="btn btn-danger" id = "destroysessaolayout" url="{{route('layoutsessao.destroy',$s->id)}}" data-id="{{$s->id}}">
                        Excluir
</a>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endif
@endisset


<script>
    $('.sessions').sortable({
        appendTo: document.body
    });
</script>
