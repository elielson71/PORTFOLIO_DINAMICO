<x-layout>

    <div class="container">
        <div class="col-md-8 col-lg-12 tab-content">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="empresa-tab" data-bs-toggle="tab" data-bs-target="#empresa-tab-pane" type="button" role="tab" aria-controls="empresa-tab-pane" aria-selected="true">Empresa</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="site-tab" data-bs-toggle="tab" data-bs-target="#site-tab-pane" type="button" role="tab" aria-controls="site-tab-pane" aria-selected="false">Site</button>
                </li>
            </ul>
            <form class="row g-3 needs-validation" id="contactForm" action="{{route('settings.store')}}">
                <div class="tab-content " id="myTabContent">
                    <div class="tab-pane fade show active" id="empresa-tab-pane" role="tabpanel" aria-labelledby="empresa-tab" tabindex="0">
                        <div class="tab-pane fade show active" id="empresa" role="tabpanel" aria-controls="v-pills-empresa" aria-selected="true">
                            <div class="row g-3 position-relative">
                                <div class="row g-3 ">
                                    <div class="col-md-5">
                                        <label class="form-label" for="nome">Nome</label>
                                        <input class="form-control" id="nome" type="text" placeholder="Nome" required="" />
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label" for="telefone">Telefone</label>
                                        <input class="form-control" id="telefone" type="text" placeholder="Telefone" data-sb-validations="" />
                                    </div>
                                    <div class="col-md-5">
                                        <label class="form-label" for="endereco">Endereço</label>
                                        <input class="form-control" id="endereco" type="text" placeholder="Endereço" data-sb-validations="" />
                                    </div>
                                </div>

                                <div class="row g-3 ">
                                    <div class="col-md-4">
                                        <label class="form-label" for="instragem">Instragem</label>
                                        <input class="form-control" id="instragem" type="text" placeholder="Instragem" data-sb-validations="" />
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="twitter">Twitter</label>
                                        <input class="form-control" id="twitter" type="text" placeholder="Twitter" data-sb-validations="" />
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="facebook">Facebook</label>
                                        <input class="form-control" id="facebook" type="text" placeholder="Facebook" data-sb-validations="" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="linkedIn">Linkedin</label>
                                    <input class="form-control" id="linkedIn" type="text" placeholder="LinkedIn" data-sb-validations="" />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="youtube">Youtube</label>
                                    <input class="form-control" id="youtube" type="text" placeholder="Youtube" data-sb-validations="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="site-tab-pane" role="tabpanel" aria-labelledby="site-tab" tabindex="0">
                        <div class="col-md-12 mt-2 mb-2">
                            <div class="row g-3 position-relative">
                                <div class="row g-3 position-relative">
                                    <div class="col-md-12">
                                        <label class="form-label" for="textoRodape">Texto do Rodapé </label>
                                        <input class="form-control" id="textoRodape" type="text" placeholder="Texto Rodapé" data-sb-validations="" />
                                    </div>
                                </div>
                                <div class="row g-3 position-relative">
                                    <div class="col-md-12 ">
                                        <label class="form-label" for="cor">Cor Principal</label>
                                        <input class="form-control" name="color_site" id="cor" type="text" placeholder="#ffff" required="" />
                                    </div>
                                </div>
                                <div class="row g-3 position-relative">
                                    <div class="col-md-6">
                                        <div class="input-group  mb-1">
                                            <input type="file" class="form-control" id="logo">
                                            <label class="input-group-text" name="logo" >Logo</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group col-md-6 mb-1">
                                            <input type="file" class="form-control" id="icone">
                                            <label class="input-group-text" name="icone">icone</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-success btn-lg " id="" type="submit">Salvar</button>
            </form>





        </div>
    </div>
</x-layout>
