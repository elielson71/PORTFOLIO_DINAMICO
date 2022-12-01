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
<div class="accordion accordion-flush" id="accordion-sessions">
    @foreach ($sessoesLayout as $key => $s)

    <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                {{$s->titulo}} #{{$key+1}}
            </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample" style="">
            <a href="{{route('sessao.editar',$s->id)}}" class="btn btn-primary">Editar</a>
            <form action="{{route('sessao.excluir',$s->id)}}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger">
                    Excluir
                </button>
            </form>
        </div>
    </div>
    @endforeach
</div>
@else
<h3>
    Não existe Dados para ser exibidos!
</h3>
@endif
@endisset


<script>
    $('#accordion-sessions').sortable({
        appendTo: document.body
    });
</script>
