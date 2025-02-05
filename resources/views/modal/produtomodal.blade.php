<div class="modal" tabindex="-1" id="modal_produto">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Produto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_modal_produto">
                <div class="form-row justify-content-end">
                        <div class="custom-control custom-switch d-block">
                            <input type="checkbox" class="custom-control-input" id="switch_produto" checked>
                            <label class="custom-control-label" for="switch_produto">Ativo</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 form-group ">
                            <label for="form_nome_produto">Nome</label>
                            <input type="text" class="form-control" id="form_nome_produto" name="form_nome_produto" required minlength="3">
                            <div class="invalid-feedback">
                                Digite o nome do produto com pelo menos 3 caracteres.
                            </div>
                        </div>
                        <div class="col-12 form-group">
                            <label for="form_descricao_produto">Descrição</label>
                            <textarea class="form-control" id="form_descricao_produto" name="form_descricao_produto"></textarea>
                        </div>
                        <div class="col-6 form-group">
                            <label for="form_cor_produto">Cor</label>
                            <input type="text" class="form-control" name="form_cor_produto" id="form_cor_produto" required minlength="3">
                            <div class="invalid-feedback">
                                Adicione uma cor com pelo menos 3 caracteres.
                            </div>
                        </div>
                        <div class="col-6 form-group">
                            <label for="form_preco_produto">Preço Unitário</label>
                            <input type="int" step="0.01" class="form-control money" name="form_preco_produto" id="form_preco_produto" required>
                            <div class="invalid-feedback">
                                Adicione um valor para o item maior que 0.
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" id="btn_criar_produto">Salvar</button>
            </div>
        </div>
    </div>
</div>