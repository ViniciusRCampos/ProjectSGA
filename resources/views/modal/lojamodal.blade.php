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
                <form>
                    <div class="form-row justify-content-end">
                        <div class="custom-control custom-switch d-block">
                            <label class="custom-control-label" for="switch_loja">Ativo</label>
                            <input type="checkbox" class="custom-control-input" id="switch_loja" checked>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-8 form-group ">
                            <label for="form_nome_loja">Nome</label>
                            <input type="text" class="form-control" id="form_nome_loja" name="form_nome_loja">
                        </div>
                        <div class="col-4 form-group ">
                            <label for="form_cnpj_loja">CNPJ</label>
                            <input type="text" class="form-control" name="form_cnpj_loja" id="form_cnpj_loja">
                        </div>

                        <div class="col-8 form-group ">
                            <label for="form_cep_loja">CEP</label>
                            <input type="text" class="form-control" id="form_cep_loja" name="form_cep_loja">
                        </div>

                        <div class="col-4 form-group ">
                            <label for="form_cidade_loja">Cidade</label>
                            <input type="text" readonly disabled class="form-control" name="form_cidade_loja" id="form_cidade_loja">
                        </div>

                        <div class="col-12 form-group ">
                            <label for="form_endereco_loja">Endereço</label>
                            <input type="text" readonly disabled class="form-control" name="form_endereco_loja" id="form_endereco_loja">
                        </div>

                        <div class="col-8 form-group ">
                            <label for="form_complemento_loja">Complemento</label>
                            <input type="text" class="form-control" id="form_complemento_loja" name="form_complemento_loja">
                        </div>

                        <div class="col-4 form-group ">
                            <label for="form_numero_loja">Numero</label>
                            <input type="text" class="form-control" id="form_numero_loja" name="form_numero_loja">
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
                <button type="button" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>