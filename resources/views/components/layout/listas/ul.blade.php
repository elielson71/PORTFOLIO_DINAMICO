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
        <li class="list-group-item d-flex " order="{{$key}}">
            <input type="hidden" id="id_sessao_list" value="{{$s->id}}">
            <div class="p-3">
                <i class="fa-solid fa-bars"></i>
            </div>
            <h2 class="p-2 flex-grow-1">
                {{$s->titulo}}
            </h2>
            <div class="d-flex justify-content-between">
                <div class="mt-2 p-1">
                    <a href="{{route('sessao.editar',$s->id)}}" class="btn btn-primary p-2"><i class="fa-solid fa-pen-to-square"></i></a>
                </div>
                <div class="mt-2 p-1">
                    <a class="btn btn-danger p-2" id="destroysessaolayout" url="{{route('layoutsessao.destroy',$s->id)}}" data-id="{{$s->id}}">
                        <i class="fa-regular fa-trash"></i>
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
