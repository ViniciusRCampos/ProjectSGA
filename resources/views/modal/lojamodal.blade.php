<div class="modal" tabindex="-1" id="modal_loja">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Loja</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_modal_loja">
                    <div class="form-row justify-content-end">
                        <div class="custom-control custom-switch d-block">
                            <input type="checkbox" class="custom-control-input" id="switch_loja" checked>
                            <label class="custom-control-label" for="switch_loja">Ativo</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-7 form-group ">
                            <label for="form_nome_loja">Nome</label>
                            <input type="text" class="form-control" id="form_nome_loja" name="form_nome_loja" required minlength="3">
                            <div class="invalid-feedback">
                                Digite um nome válido.
                            </div>
                        </div>
                        <div class="col-5 form-group ">
                            <label for="form_cnpj_loja">CNPJ</label>
                            <input type="text" class="form-control cnpj" name="form_cnpj_loja" id="form_cnpj_loja" required>
                            <div class="invalid-feedback">
                                CNPJ inválido! Digite um CNPJ válido.
                            </div>
                        </div>

                        <div class="col-5 form-group ">
                            <label for="form_cep_loja">CEP</label>
                            <div class="input-group">
                                <input type="text" class="form-control cep" id="form_cep_loja" name="form_cep_loja" required>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-info" id="btn_pesquisa_cep" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                        <path d="M21 21l-6 -6" />
                                    </svg></button>
                                </div>
                                <div class="invalid-feedback">
                                CEP inválido! Digite um CEP válido.
                            </div>
                            </div>
                        </div>

                        <div class="col-7 form-group ">
                            <label for="form_cidade_loja">Cidade</label>
                            <input type="text" readonly disabled class="form-control" name="form_cidade_loja" id="form_cidade_loja">
                        </div>

                        <div class="col-12 form-group ">
                            <label for="form_endereco_loja">Endereço</label>
                            <input type="text" readonly disabled class="form-control" name="form_endereco_loja" id="form_endereco_loja">
                        </div>

                        <div class="col-6 form-group ">
                            <label for="form_complemento_loja">Complemento</label>
                            <input type="text" class="form-control" id="form_complemento_loja" name="form_complemento_loja">
                        </div>

                        <div class="col-6 form-group ">
                            <label for="form_numero_loja">Numero</label>
                            <input type="text" class="form-control" id="form_numero_loja" name="form_numero_loja" required>
                            <div class="invalid-feedback">
                                Número obrigatorio, caso não tenha coloque S/N
                            </div>
                        </div>

                        <div class="col-8 form-group ">
                            <label for="form_bairro_loja">Bairro</label>
                            <input type="text" readonly disabled class="form-control" id="form_bairro_loja" name="form_bairro_loja">
                        </div>

                        <div class="col-4 form-group ">
                            <label for="form_estado_loja">Estado</label>
                            <input type="text" readonly disabled class="form-control" id="form_estado_loja" name="form_estado_loja">
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" id="btn_criar_loja">Salvar</button>
            </div>
        </div>
    </div>
</div>