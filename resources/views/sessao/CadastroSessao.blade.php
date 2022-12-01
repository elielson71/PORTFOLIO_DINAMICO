<x-layout>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{ $action }}" method="POST">
                    @csrf
                    @isset($sessoes)
                        @method('PUT')
                        <h5 class="diplay-5 " align="center">Editando Sessão - {{$sessoes->titulo}}</h5>
                        @empty(!old())
                            @php
                                $sessoes->fill(old());
                            @endphp
                        @endenv
                    @endisset
                    <div class="form-group">
                        <label for="titulo">Titulo Sessão</label>
                        <input id="titulo" name="titulo" placeholder="Titulo" type="text" required="required" class="form-control" @isset($sessoes->titulo)value="{{$sessoes->titulo}}"@endisset
                        >
                    </div>
                    <div class="form-group">
                        <label for="conteudo">Conteudo em texto</label>
                        <textarea id="conteudo" name="conteudo" cols="40" rows="5" class="form-control" >@isset($sessoes->titulo){{$sessoes->conteudo}}@endisset</textarea>
                    </div>
                    <div class="form-group">
                        <label for="link">Link Vídeo</label>
                        <input id="link" name="link" placeholder="Link Video" type="text" class="form-control" @isset($sessoes->titulo)value="{{$sessoes->link}}"@endisset">
                    </div>
                    <div class="form-group">
                        <a href="{{route('sessao.index')}}" class="btn btn-primary">Voltar</a>
                        <button name="submit" type="submit" class="btn btn-success">Salvar</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
