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
                <form>
                <div class="form-row justify-content-end">
                        <div class="custom-control custom-switch d-block">
                            <label class="custom-control-label" for="switch_produto">Ativo</label>
                            <input type="checkbox" class="custom-control-input" id="switch_produto" checked>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 form-group ">
                            <label for="form_nome_produto">Nome</label>
                            <input type="text" class="form-control" id="form_nome_produto" name="form_nome_produto">
                        </div>
                        <div class="col-12 form-group">
                            <label for="form_descricao_produto">Descrição</label>
                            <textarea class="form-control" id="form_descricao_produto" name="form_descricao_produto"></textarea>
                        </div>
                        <div class="col-6 form-group">
                            <label for="form_cor_produto">Cor</label>
                            <input type="text" class="form-control" name="form_cor_produto" id="form_cor_produto">
                        </div>
                        <div class="col-6 form-group">
                            <label for="form_preco_produto">Preço Unitário</label>
                            <input type="int" class="form-control" name="form_preco_produto" id="form_preco_produto">
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