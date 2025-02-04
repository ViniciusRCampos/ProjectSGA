<div class="modal" tabindex="-1" id="modal_cliente">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row justify-content-end">
                        <div class="custom-control custom-switch d-block">
                            <label class="custom-control-label" for="switch_cliente">Ativo</label>
                            <input type="checkbox" class="custom-control-input" id="switch_cliente" checked>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-8 form-group ">
                            <label for="form_nome_cliente">Nome</label>
                            <input type="text" class="form-control" id="form_nome_cliente" name="form_nome_cliente">
                        </div>
                        <div class="col-4 form-group ">
                            <label for="form_cpf_cliente">CPF</label>
                            <input type="text" class="form-control" name="form_cpf_cliente" id="form_cpf_cliente">
                        </div>
                        <div class="col-8 form-group">
                            <label for="form_email_cliente">Email</label>
                            <input type="email" class="form-control" id="form_email_cliente" name="form_email_cliente">
                        </div>
                        <div class="col-4 form-group">
                            <label for="form_genero_cliente">Genero</label>
                            <select name="form_genero_cliente" id="form_genero_cliente" class="form-control">
                                <option></option>
                                <option>Masculino</option>
                                <option>Feminino</option>
                            </select>
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