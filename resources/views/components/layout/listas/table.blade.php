
<style>

.nested {
  padding: 4px 0;
  border: 1px dotted #bbb;
}

.item {
  padding: 8px;
}
</style>
<table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Ação</th>
                    </thead>
                    <tbody class="nested">
                        @isset($sessoesLayout)
                        @if (count($sessoesLayout)!=0)
                        @foreach ($sessoesLayout as $key => $s)
                        <tr class="item">
                            <td>{{$key+1}}</td>
                            <td>{{$s->titulo}}</td>
                            <td class="d-flex ">
                                <a href=""></a>
                                <a href="{{route('sessao.editar',$s->id)}}" class="btn btn-primary">Editar</a>
                                <form action="{{route('sessao.excluir',$s->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger">
                                        Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                Não existe Dados para ser exibidos!

                            </td>
                        </tr>
                        @endif
                        @endisset
                    </tbody>
                </table>


<script>
    $('.nested').sortable({
  appendTo: document.body
});
</script>
