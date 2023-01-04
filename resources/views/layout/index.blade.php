<x-layout>
    <div class="container">
        <div class="container">
            <a href="{{route('layout.create')}}" class="btn btn-info"> Nova Layout</a>
        </div>
        @isset($mensagem)
        <div class="alert alert-success">
            {{$mensagem}}
        </div>
        @endisset
        <div class="container" style="padding: 10px;">
            <div class="card">
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Ação</th>
                    </thead>
                    <tbody>
                        @if (count($layouts)!=0)
                        @foreach ($layouts as $key => $s)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$s->titulo}}</td>
                            <td class="d-flex ">
                                <a href=""></a>
                                <a href="{{route('layout.edit',$s->id)}}" class="btn btn-primary">Editar</a>
                                <form action="{{route('layout.destroy',$s->id)}}" method="POST">
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
