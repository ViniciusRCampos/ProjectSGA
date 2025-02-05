<div class="modal" tabindex="-1" id="modal_cliente">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_modal_cliente">
                    <div class="form-row justify-content-end">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="switch_cliente" checked>
                            <label class="custom-control-label" for="switch_cliente">Ativo</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-7 form-group ">
                            <label for="form_nome_cliente">Nome</label>
                            <input type="text" class="form-control" id="form_nome_cliente" name="form_nome_cliente" required minlength="3" pattern="^(?!.*\s{2,})[A-Za-zÀ-ÖØ-öø-ÿ]+(?:[' ][A-Za-zÀ-ÖØ-öø-ÿ]+)*$">
                            <div class="invalid-feedback">
                                Digite um nome válido.
                            </div>
                        </div>
                        <div class="col-5 form-group ">
                            <label for="form_cpf_cliente">CPF</label>
                            <input type="text" class="form-control cpf" name="form_cpf_cliente" id="form_cpf_cliente"  minlength="14" required>
                            <div class="invalid-feedback">
                                CPF inválido! Digite um CPF válido.
                            </div>
                        </div>
                        <div class="col-7 form-group">
                            <label for="form_email_cliente">Email</label>
                            <input type="email" class="form-control" id="form_email_cliente" name="form_email_cliente" required>
                            <div class="invalid-feedback">
                                Digite um e-mail válido.
                            </div>
                        </div>
                        <div class="col-5 form-group">
                            <label for="form_genero_cliente">Gênero</label>
                            <select name="form_genero_cliente" id="form_genero_cliente" class="form-control" required>
                                <option value="">Selecione</option>
                                @isset($data['genders'])
                                @foreach ($data['genders'] as $gender)
                                <option value="{{$gender->id}}" >{{$gender->name}}</option>
                                @endforeach
                                @endisset
                            </select>
                            <div class="invalid-feedback">
                                Selecione uma opção.
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" id="btn_criar_cliente">Salvar</button>
            </div>
        </div>
    </div>
</div>