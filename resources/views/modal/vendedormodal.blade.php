<div class="modal" tabindex="-1" id="modal_vendedor">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">vendedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_modal_vendedor">
                <div class="form-row justify-content-end">
                        <div class="custom-control custom-switch d-block">
                            <input type="checkbox" class="custom-control-input" id="switch_vendedor" checked>
                            <label class="custom-control-label" for="switch_vendedor">Ativo</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-8 form-group ">
                            <label for="form_nome_vendedor">Nome</label>
                            <input type="text" class="form-control" id="form_nome_vendedor" name="form_nome_vendedor" required minlength="3" pattern="^(?!.*\s{2,})[A-Za-zÀ-ÖØ-öø-ÿ]+(?:[' ][A-Za-zÀ-ÖØ-öø-ÿ]+)*$">
                            <div class="invalid-feedback">
                                Digite um nome válido.
                            </div>
                        </div>
                        <div class="col-4 form-group ">
                            <label for="form_cpf_vendedor">CPF</label>
                            <input type="text" class="form-control cpf" name="form_cpf_vendedor" id="form_cpf_vendedor" required>
                            <div class="invalid-feedback">
                                CPF inválido! Digite um CPF válido.
                            </div>
                        </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary btn-criar" id="btn_criar_vendedor">Salvar</button>
                <button type="button" class="btn btn-primary btn-editar d-none" id="modal_btn_editar_vendedor">Salvar</button>
            </div>
        </div>
    </div>
</div>