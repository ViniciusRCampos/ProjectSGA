@extends('layouts.master')

@section('title', 'SGA - Home')

@section('page-style')
<style>
    select option[data-active="0"] {
        color: gray;
    }

    .btn-remover {
        cursor: pointer;
    }
</style>
@endsection


@section('content')

<div class="container-fluid">
    <h2 class="title">Vendas - Produtos</h2>
    <div class="row">
        <div class="col-12">
            <div class="card mb-1">
                <div class="row m-0">
                    <div class="col-12">
                        <h5 class="card-title text-secondary mt-1 mb-0">Dados da venda</h5>
                        <hr class="my-1">
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="cliente_select" class="mb-0">Cliente</label>
                        <div class="d-flex">
                            <select name="cliente_select" id="cliente_select" class="form-control pl-1">
                                <option selected value="">Selecione o Cliente</option>
                                @isset($data['clients'])
                                @foreach ($data['clients'] as $client)
                                <option value="{{$client->id}}" data-active={{$client->active}}>{{$client->name}}</option>
                                @endforeach
                                @endisset
                            </select>
                            <button class='btn p-0 pl-2' id="btn_adicionar_cliente" data-toggle="modal" data-target="#modal_cliente">
                                <svg class="text-success" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-square-plus">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M9 12h6" />
                                    <path d="M12 9v6" />
                                    <path d="M3 5a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-14z" />
                                </svg>
                            </button>
                            <button class="btn p-0 text-info" id="btn_editar_cliente" disabled>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                    <path d="M16 5l3 3" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="loja_select" class="mb-0">Loja</label>
                        <div class="d-flex">
                            <select name="loja_select" id="loja_select" class="form-control pl-1">
                                <option selected value="">Selecione uma loja</option>
                                @isset($data['stores'])
                                @foreach ($data['stores'] as $store)
                                <option value="{{$store->id}}" data-active={{$store->active}}>{{$store->name}}</option>
                                @endforeach
                                @endisset
                            </select>
                            <button class='btn p-0 pl-2' id="btn_adicionar_loja" data-toggle="modal" data-target="#modal_loja">
                                <svg class="text-success" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-square-plus">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M9 12h6" />
                                    <path d="M12 9v6" />
                                    <path d="M3 5a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-14z" />
                                </svg>
                            </button>
                            <button class="btn p-0 text-info" id="btn_editar_loja" disabled>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                    <path d="M16 5l3 3" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="vendedor_select" class="mb-0">Vendedor</label>
                        <div class="d-flex">
                            <select name="vendedor_select" id="vendedor_select" class="form-control pl-1" disabled>
                                <option value="">Selecione o Vendedor</option>
                            </select>
                            <button class='btn p-0 pl-2' id="btn_adicionar_vendedor" data-toggle="modal" data-target="#modal_vendedor" disabled>
                                <svg class="text-success" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-square-plus">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M9 12h6" />
                                    <path d="M12 9v6" />
                                    <path d="M3 5a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-14z" />
                                </svg>
                            </button>
                            <button class="btn p-0 text-info" id="btn_editar_vendedor" disabled>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                    <path d="M16 5l3 3" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card my-1">
                <div class="row m-0">
                    <div class="col-12 mb-2">
                        <h5 class="card-title text-secondary mt-1 mb-0">Produtos</h5>
                        <hr class="my-1">
                    </div>
                    <div class="col-4 mb-2">
                        <label for="produto_select" class="mb-0">Produto</label>
                        <div class="d-flex">
                            <select name="produto_select" id="produto_select" class="form-control pl-1" disabled>
                                <option value="">Selecione o Produto</option>
                                @isset($data['products'])
                                @foreach ($data['products'] as $product)
                                <option value="{{$product->id}}" data-active={{$store->active}}>{{$product->name}}</option>
                                @endforeach
                                @endisset
                            </select>
                            <button class='btn p-0 pl-2' data-toggle="modal" data-target="#modal_produto" id="btn_adicionar_produto" disabled>
                                <svg class="text-success" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-square-plus">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M9 12h6" />
                                    <path d="M12 9v6" />
                                    <path d="M3 5a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-14z" />
                                </svg>
                            </button>
                            <button class="btn p-0 text-info" disabled id="btn_editar_produto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                    <path d="M16 5l3 3" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="col-8 mb-2">
                        <label for="descricao_produto_textarea" class="mb-0">Descrição</label>
                        <textarea name="descricao_produto_textarea" id="descricao_produto_textarea" readonly disabled class='form-control' style="height: 38px; resize:none;">Descrição do produto</textarea>
                    </div>
                    <div class="col-3 mb-2 pr-1">
                        <label for="cor_produto_input" class="mb-0">Cor</label>
                        <input name="cor_produto_input" id="cor_produto_input" readonly disabled class='form-control'>
                    </div>
                    <div class="col-3 mb-2">
                        <label for="preco_produto_input" class="mb-0">Preço</label>
                        <input name="preco_produto_input" id="preco_produto_input" readonly disabled class='form-control' placeholder="R$ 0,00">
                    </div>
                    <div class="col-3 mb-2">
                        <label for="quantidade_produto_input" class="mb-0">Quantidade</label>
                        <input type="number" name="quantidade_produto_input" id="quantidade_produto_input" class='form-control' min=0 value=0 disabled>
                    </div>
                    <div class="col-3 mb-2">
                        <label for="total_produto_input" class="mb-0">Valor Total</label>
                        <input type="string" name="total_produto_input" disabled readonly id="total_produto_input" class='form-control' placeholder="R$ 0,00">
                    </div>
                    <div class="col-12 mb-2">
                        <div class="d-flex justify-content-end">
                            <button class='btn btn-success' id="btn_add_produto" disabled>Adicionar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card mt-1">
                <div class="row m-0">
                    <div class="col-12 mb-2">
                        <h5 class="card-title text-secondary mt-1 mb-0">Resumo</h5>
                    </div>
                    <div class="col-12">
                        <div class="table-responsive border">
                            <table class="table" id="tabela_produtos">
                                <thead>
                                    <th scope="col">#</th>
                                    <th scope="col">Produto</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Cor</th>
                                    <th scope="col">Quantidade</th>
                                    <th scope="col">Preço</th>
                                    <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class='d-flex justify-content-end my-2'>
                            <p class="m-0 mr-1 h4 bold">Total: </p>
                            <span class="border h4" id="total_span">R$ 0,00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mt-2">
            <div class="card">
                <div class="row m-0">
                    <div class="col-6 my-2">
                        <label for="observacao_input" class="mb-0">Observação</label>
                        <input name="observacao_input" id="observacao_input" disabled class='form-control'>
                    </div>
                    <div class="col-6 my-2">
                        <label for="pagamento_select" class="mb-0"></label>
                        <div class="d-flex justify-content-end">
                            <select name="pagamento_select" id="pagamento_select" class="form-control pl-1 mr-2" disabled>
                                <option value="">Selecione o pagamento</option>
                                @isset($data['paymentMethods'])
                                @foreach ($data['paymentMethods'] as $payment)
                                <option value={{$payment->id}}>{{$payment->name}}</option>
                                @endforeach
                                @endisset
                            </select>

                            <button class='btn btn-primary' disabled id="btn_finalizar_venda">Finalizar</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('modal.clientemodal')
@include('modal.lojamodal')
@include('modal.produtomodal')
@include('modal.vendedormodal')
@endsection
@section('page-script')
<script>
    const data = @json($data);
    const observationInput = document.getElementById('observacao_input');
    const btnFinish = document.getElementById('btn_finalizar_venda');
    const paymentSelect = document.getElementById('pagamento_select');
    const sellersSelect = document.getElementById('vendedor_select');
    const btnEditSeller = document.getElementById('btn_editar_vendedor');
    const btnAddSeller = document.getElementById('btn_adicionar_vendedor');
    const storeSelect = document.getElementById('loja_select');
    const btnEditStore = document.getElementById('btn_editar_loja');
    const clientSelect = document.getElementById('cliente_select');
    const btnEditClient = document.getElementById('btn_editar_cliente');
    const productSelect = document.getElementById('produto_select');
    const btnEditProduct = document.getElementById('btn_editar_produto');
    const quantityProduct = document.getElementById('quantidade_produto_input');
    const btnModalProduct = document.getElementById('btn_adicionar_produto');
    const btnAddProduct = document.getElementById('btn_add_produto');
    const totalProductInput = document.getElementById('total_produto_input');
    const btnCreateClient = document.getElementById('btn_criar_cliente');
    const btnCreateStore = document.getElementById('btn_criar_loja');
    const btnCreateSeller = document.getElementById('btn_criar_vendedor');
    const btnCreateProduct = document.getElementById('btn_criar_produto');
    const btnSearchCep = document.getElementById('btn_pesquisa_cep');
    const urlSearchCep = "https://viacep.com.br/ws/";

    let allSellers = [];
    let orderSummary = [];

    console.log(data);
    document.addEventListener("DOMContentLoaded", function() {
        $('.cpf').mask('000.000.000-00', {
            reverse: true
        });
        $('.cep').mask('00000-000');
        $('.cnpj').mask('00.000.000/0000-00', {
            reverse: true
        });
        $('.money').mask('000.000.000.000.000,00', {
            reverse: true
        });

        $('.money').on('blur', function() {
            let value = $(this).val();
            if (value === '' || value === '0,00') {
                $(this).val('R$ 0,00');
                $(this).addClass('is-invalid');
            } else {
                $(this).removeClass('is-invalid');
                $(this).val('R$ ' + value);
            }
        });

        $('.money').on('focus', function(e) {
            let value = $(this).val();
            if (value === 'R$ 0,00') {
                e.target.value = ''
            } else {
                $(this).val(value.replace('R$ ', ''));
            }
        });

        function createOptions(element, arrayOptions) {
            arrayOptions.forEach(e => {
                let option = document.createElement("option");
                option.value = e.id;
                option.innerHTML = e.name;
                element.appendChild(option);
            });
        }

        function clearOptions(element) {
            while (element.length > 1) {
                element.remove(1);
            };
        }

        function fillProductsFields(product) {
            let price = parseFloat(product['price']).toLocaleString('pt-BR', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
            document.getElementById('cor_produto_input').value = product['color'];
            document.getElementById('preco_produto_input').value = `R$ ${price}`;
            document.getElementById('descricao_produto_textarea').innerHTML = product['description'];
        }

        function resetProductFields() {
            document.getElementById('cor_produto_input').value = '';
            document.getElementById('preco_produto_input').value = `R$ 0,00`;
            document.getElementById('descricao_produto_textarea').innerHTML = 'Descrição do produto';
        }

        function createTableRows() {
            const selectedOption = productSelect.options[productSelect.selectedIndex];
            const produtoId = selectedOption.value;
            const name = productSelect[productSelect.selectedIndex].text;
            const color = document.getElementById('cor_produto_input').value;
            const quantity = quantityProduct.value;
            const price = document.getElementById('preco_produto_input').value;
            const total = totalProductInput.value;
            const productsTable = document.getElementById("tabela_produtos").querySelector("tbody");

            const row = document.createElement("tr");
            row.innerHTML = `
            <td>
                <svg class="text-danger btn-remover" data-id="${produtoId}" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M18 6l-12 12" />
                    <path d="M6 6l12 12" />
                </svg>
            </td>
            <td>${produtoId}</td>
            <td>${name}</td>
            <td>${color}</td>
            <td>${quantity}</td>
            <td>${price}</td>
            <td>${total}</td>
        `;


            productsTable.appendChild(row);

            document.querySelectorAll('svg.btn-remover').forEach(svg => {
                svg.removeEventListener('click', clickToRemoveRow);
                svg.addEventListener('click', clickToRemoveRow);
            });

            selectedOption.remove();
            productSelect.value = ''
            productSelect.dispatchEvent(new Event('change', {
                bubbles: true
            }));
            updateSaleValue()
        }

        function updateSaleValue() {
            let total = 0;
            document.querySelectorAll("#tabela_produtos tbody tr td:last-child").forEach(td => {
                total += parseFloat(td.textContent.replace("R$ ", "").replace(",", "."));
            });
            document.getElementById('total_span').textContent = `R$ ${total.toFixed(2).replace(".", ",")} `;
        }

        function addProductToOrder() {
            orderSummary.push({
                id: productSelect.value,
                quantity: parseInt(quantityProduct.value),
                total: parseFloat(totalProductInput.value.replace("R$ ", "").replace(",", '.'))
            })
            togglePaymentSelect();
        }

        function clickToRemoveRow(element) {
            removeProductRow(element.currentTarget);
        }

        function orderSelectOptions(select) {
            let options = Array.from(select.options);

            options.sort((a, b) => a.value - b.value);

            select.innerHTML = "";
            options.forEach(option => select.appendChild(option));
        }

        function togglePaymentSelect() {
            const orderSize = orderSummary.length;
            paymentSelect.toggleAttribute('disabled', !orderSize > 0);
            observationInput.toggleAttribute('disabled', !orderSize > 0);
            paymentSelect.value = '';
        }

        function removeProductRow(element) {
            const row = element.closest("tr");
            const tbody = row.parentElement;
            const index = Array.from(tbody.children).indexOf(row);
            let id = element.getAttribute('data-id');
            let option = document.createElement('option');

            row.remove();
            orderSummary = orderSummary.filter((item) => item.id != id);


            option.value = id;
            option.innerHTML = data.products.find((e) => e.id == id).name;
            productSelect.appendChild(option);

            togglePaymentSelect();
            orderSelectOptions(productSelect);
            updateSaleValue()
        }

        // Validations

        // https://www.geradorcpf.com/javascript-validar-cpf.htm
        function validarCPF(cpf) {
            cpf = cpf.replace(/[^\d]+/g, '');

            if (cpf.length !== 11 || /^(\d)\1{10}$/.test(cpf)) return false;

            add = 0;
            for (i = 0; i < 9; i++)
                add += parseInt(cpf.charAt(i)) * (10 - i);
            rev = 11 - (add % 11);
            if (rev == 10 || rev == 11)
                rev = 0;
            if (rev != parseInt(cpf.charAt(9)))
                return false;
            add = 0;
            for (i = 0; i < 10; i++)
                add += parseInt(cpf.charAt(i)) * (11 - i);
            rev = 11 - (add % 11);
            if (rev == 10 || rev == 11)
                rev = 0;
            if (rev != parseInt(cpf.charAt(10)))
                return false;
            return true;
        }


        // https://www.geradorcnpj.com/javascript-validar-cnpj.htm
        function validarCNPJ(cnpj) {

            cnpj = cnpj.replace(/[^\d]+/g, '');

            if (cnpj.length !== 14 || /^(\d)\1{13}$/.test(cnpj)) return false;

            // Valida DVs
            tamanho = cnpj.length - 2
            numeros = cnpj.substring(0, tamanho);
            digitos = cnpj.substring(tamanho);
            soma = 0;
            pos = tamanho - 7;
            for (i = tamanho; i >= 1; i--) {
                soma += numeros.charAt(tamanho - i) * pos--;
                if (pos < 2)
                    pos = 9;
            }
            resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
            if (resultado != digitos.charAt(0))
                return false;

            tamanho = tamanho + 1;
            numeros = cnpj.substring(0, tamanho);
            soma = 0;
            pos = tamanho - 7;
            for (i = tamanho; i >= 1; i--) {
                soma += numeros.charAt(tamanho - i) * pos--;
                if (pos < 2)
                    pos = 9;
            }
            resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
            if (resultado != digitos.charAt(1))
                return false;

            return true;

        }

        // Events

        document.querySelectorAll('.modal input').forEach((input) => {
            input.addEventListener('input', (e) => {
                const target = e.currentTarget;
                target.value = target.value.replace(/\s+/g, ' ');

                const isValid = target.checkValidity();
                target.classList.toggle('is-invalid', !isValid);
                target.classList.toggle('is-valid', isValid);

                if (target.classList.contains('cpf')) {
                    const isValidCPF = validarCPF(target.value);
                    target.classList.toggle('is-invalid', !isValidCPF);
                    target.classList.toggle('is-valid', isValidCPF);
                }

                if (target.classList.contains('cnpj')) {
                    const isValidCNPJ = validarCNPJ(target.value);
                    target.classList.toggle('is-invalid', !isValidCNPJ);
                    target.classList.toggle('is-valid', isValidCNPJ);
                }
            });
        });

        btnCreateClient.addEventListener('click', (e) => {
            const form = document.getElementById('form_modal_cliente')
            const genreSelect = document.getElementById('form_genero_cliente');

            genreSelect.classList.toggle('is-invalid', genreSelect.value == '');
            genreSelect.classList.toggle('is-valid', !genreSelect.value == '');

            if (form.querySelectorAll('.is-invalid').length > 0) {
                e.preventDefault()
                e.stopPropagation()
                return;
            }
            createClient();
        })

        btnCreateStore.addEventListener('click', (e) => {
            const form = document.getElementById('form_modal_loja')

            if (form.querySelectorAll('.is-invalid').length > 0) {
                e.preventDefault()
                e.stopPropagation()
                return;
            }
            createStore();
        })


        btnCreateSeller.addEventListener('click', (e) => {
            const form = document.getElementById('form_modal_vendedor')

            if (form.querySelectorAll('.is-invalid').length > 0) {
                e.preventDefault()
                e.stopPropagation()
                return;
            }
            createSeller();
        })

        btnCreateProduct.addEventListener('click', (e) => {
            const form = document.getElementById('form_modal_produto')

            if (form.querySelectorAll('.is-invalid').length > 0) {
                e.preventDefault()
                e.stopPropagation()
                return;
            }
            createProduct();
        })

        paymentSelect.addEventListener('change', (e) => {
            btnFinish.setAttribute('disabled', true);
            if (e.target.value != '') {
                btnFinish.removeAttribute("disabled");
            }
        })

        storeSelect.addEventListener('change', (e) => {
            sellersSelect.setAttribute('disabled', true);
            btnEditStore.setAttribute('disabled', true);
            productSelect.setAttribute('disabled', true);
            paymentSelect.setAttribute('disabled', true);
            observationInput.setAttribute('disabled', true);
            btnFinish.setAttribute('disabled', true);
            document.querySelectorAll("svg.btn-remover").forEach((e) => {
                removeProductRow(e);
            });
            updateSaleValue();
            clearOptions(sellersSelect);
            if (e.target.value != '') {
                btnEditStore.removeAttribute("disabled");
                storeSelect.setAttribute('disabled', true);
                getSellers(e.target.value);
            }
        })

        clientSelect.addEventListener('change', (e) => {
            btnEditClient.setAttribute('disabled', true);
            if (e.target.value != '') {
                btnEditClient.removeAttribute("disabled");
            }
        })

        sellersSelect.addEventListener('change', (e) => {
            btnEditSeller.setAttribute('disabled', true);
            productSelect.setAttribute('disabled', true);
            btnModalProduct.setAttribute('disabled', true);
            if (e.target.value != '') {
                btnModalProduct.removeAttribute("disabled");
                btnEditSeller.removeAttribute("disabled");
                productSelect.removeAttribute("disabled");
            }
        })

        productSelect.addEventListener('change', (e) => {
            btnEditProduct.setAttribute('disabled', true);
            btnAddProduct.setAttribute('disabled', true);
            quantityProduct.value = 0;
            totalProductInput.value = "R$ " + "0,00";
            quantityProduct.setAttribute('disabled', true);
            resetProductFields();
            if (e.target.value != '') {
                quantityProduct.removeAttribute("disabled");
                btnEditProduct.removeAttribute("disabled");
                btnAddProduct.removeAttribute("disabled");
                let product = data['products'].find((el) => el.id == e.target.value);
                fillProductsFields(product);
                quantityProduct.dispatchEvent(new Event('input', {
                    bubbles: true
                }));
            }
        })

        quantityProduct.addEventListener('keydown', (e) => {
            if (e.key === '-' || e.key === 'e') {
                e.preventDefault();
            }
        });

        quantityProduct.addEventListener('input', (e) => {
            if (e.target.value <= 0) {
                e.target.value = 1;
            }
            let quantity = e.target.value;
            let priceInput = document.getElementById('preco_produto_input')
            let price = parseFloat(priceInput.value.split('R$ ')[1].replace(',', '.'));
            let total = quantity * price
            totalProductInput.value = "R$ " + total.toLocaleString('pt-BR', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
        })

        btnAddProduct.addEventListener('click', () => {
            if (quantityProduct.value == 0) {
                toastr.warning("Por favor adicione uma quantidade de produtos");
                return
            }
            if (sellersSelect.value == '' || productSelect.value == '') {
                toastr.warning("Por favor preencha os campos faltantes");
                return
            }
            addProductToOrder();
            createTableRows();
            resetProductFields();
        })

        btnSearchCep.addEventListener('click', () => {
            const cep = document.getElementById('form_cep_loja').value.replace("-", '');
            getCepData(cep);
        })

        btnFinish.addEventListener('click', () => {
            finishSale()
        })

        // Fetchs

        function getSellers(idStore) {
            let textOption = storeSelect[0].innerHTML;
            let valueOption = storeSelect.value;
            storeSelect.value = ''
            storeSelect[0].innerHTML = "Buscando..."
            fetch(`/store/sellers/${idStore}`, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status !== 'success') {
                        toastr.error("Ops! Algo deu errado, tente novamente!");
                        storeSelect.value = ''
                    } else {
                        allSellers = data.data;
                        createOptions(sellersSelect, data.data);
                        sellersSelect.removeAttribute('disabled');
                        btnAddSeller.removeAttribute('disabled');
                        storeSelect[0].innerHTML = textOption;
                        storeSelect.removeAttribute('disabled');
                        storeSelect.value = valueOption;
                    }
                })
        }

        function getCepData(cep) {
            const city = document.getElementById('form_cidade_loja');
            const address = document.getElementById('form_endereco_loja');
            const district = document.getElementById('form_bairro_loja');
            const state = document.getElementById('form_estado_loja');

            let urlFetch = urlSearchCep + cep + '/json';

            city.value = '...';
            address.value = '...'
            district.value = '...'
            state.value = '...'

            fetch(urlFetch, {
                    method: "GET",
                    headers: {
                        'Content-Type': 'application/json',
                    }
                }).then(response => response.json())
                .then(data => {
                    city.value = data.localidade
                    address.value = data.logradouro
                    district.value = data.bairro
                    state.value = data.estado
                })
        }

        function createClient() {
            const form = document.getElementById('form_modal_cliente');
            let newClient;
            fetch('/client/add', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        name: document.getElementById('form_nome_cliente').value,
                        cpf: document.getElementById('form_cpf_cliente').value.replace("-", '').split('.').join(''),
                        email: document.getElementById('form_email_cliente').value,
                        genderId: document.getElementById('form_genero_cliente').value,
                        active: document.getElementById('switch_cliente').checked
                    })
                })
                .then(response => response.json())
                .then(dataResponse => {
                    if (dataResponse.status !== 'success') {
                        toastr.error(dataResponse.message, 'Erro', {
                            closeButton: true,
                            progressBar: true
                        });
                    } else {
                        form.reset();
                        form.querySelectorAll('.is-valid').forEach((e) => {
                            e.classList.remove('is-valid');
                        })
                        toastr.success('Cliente cadastrado com sucesso');
                        newClient = dataResponse.data;
                        data.clients.push(newClient);
                        clearOptions(clientSelect);
                        createOptions(clientSelect, data.clients);
                    }
                })
        }

        function createStore() {
            const form = document.getElementById('form_modal_loja');
            const address = document.getElementById('form_endereco_loja').value;
            const number = document.getElementById('form_numero_loja').value.trim();
            const complement = document.getElementById('form_complemento_loja').value.trim();
            const completAddress =
                complement != '' ? `${address}, ${number}, ${complement}` : `${address}, ${number}`;
            let newStore;

            fetch('/store/add', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        name: document.getElementById('form_nome_loja').value.trim(),
                        cnpj: document.getElementById('form_cnpj_loja').value.replace("-", '').replace("/", '').split('.').join(''),
                        cep: document.getElementById('form_cep_loja').value.replace("-", ''),
                        address: completAddress,
                        district: document.getElementById('form_bairro_loja').value,
                        city: document.getElementById('form_cidade_loja').value,
                        state: document.getElementById('form_estado_loja').value,
                        active: document.getElementById('switch_loja').checked
                    })
                })
                .then(response => response.json())
                .then(dataResponse => {
                    if (dataResponse.status !== 'success') {
                        toastr.error(dataResponse.message, 'Erro', {
                            closeButton: true,
                            progressBar: true
                        });
                    } else {
                        form.reset();
                        form.querySelectorAll('.is-valid').forEach((e) => {
                            e.classList.remove('is-valid');
                        })
                        toastr.success('Loja cadastrada com sucesso');
                        newStore = dataResponse.data;
                        data.stores.push(newStore);
                        clearOptions(storeSelect);
                        createOptions(storeSelect, data.stores);

                    }
                })
        }

        function createSeller() {
            const form = document.getElementById('form_modal_vendedor');
            let newSeller;
            fetch('/store/seller/add', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        name: document.getElementById('form_nome_vendedor').value,
                        cpf: document.getElementById('form_cpf_vendedor').value.replace("-", '').split('.').join(''),
                        storeId: storeSelect.value,
                        active: document.getElementById('switch_vendedor').checked
                    })
                })
                .then(response => response.json())
                .then(dataResponse => {
                    if (dataResponse.status !== 'success') {
                        toastr.error(dataResponse.message, 'Erro', {
                            closeButton: true,
                            progressBar: true
                        });
                    } else {
                        form.reset();
                        form.querySelectorAll('.is-valid').forEach((e) => {
                            e.classList.remove('is-valid');
                        })
                        toastr.success('Vendedor cadastrado com sucesso');
                        newSeller = dataResponse.data;
                        allSellers.push(newSeller);
                        clearOptions(sellersSelect);
                        createOptions(sellersSelect, allSellers);
                    }
                })
        }

        function createProduct() {
            const form = document.getElementById('form_modal_produto');
            const productName = document.getElementById('form_nome_produto').value.trim()
            const description = document.getElementById('form_descricao_produto').innerText.trim();
            let newProduct;
            fetch('/product/add', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        name: productName,
                        description: description == '' ? productName : description,
                        color: document.getElementById('form_cor_produto').value.trim(),
                        price: parseFloat(document.getElementById('form_preco_produto').value.replace("R$ ", "").replace(',', '.')),
                        active: document.getElementById('switch_produto').checked
                    })
                })
                .then(response => response.json())
                .then(dataResponse => {
                    if (dataResponse.status !== 'success') {
                        toastr.error(dataResponse.message, 'Erro', {
                            closeButton: true,
                            progressBar: true
                        });
                    } else {
                        form.reset();
                        form.querySelectorAll('.is-valid').forEach((e) => {
                            e.classList.remove('is-valid');
                        })
                        toastr.success('Produto cadastrado com sucesso');
                        newProduct = dataResponse.data;
                        data.products.push(newProduct);
                        clearOptions(clientSelect);
                        createOptions(clientSelect, data.products);
                    }
                })
        }

        function finishSale() {
            const totalItens = orderSummary.reduce((acc, cur) => {
                return acc + cur.quantity
            }, 0);
            const totalPrice = orderSummary.reduce((acc, cur) => {
               return acc + cur.total
            }, 0);

            console.log('cheguei', totalItens, totalPrice)

            fetch('/sale/register', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        clientId: clientSelect.value,
                        storeId: storeSelect.value,
                        sellerId: sellersSelect.value,
                        paymentId: paymentSelect.value,
                        totalItens: totalItens,
                        totalPrice: totalPrice,
                        observation: document.getElementById('observacao_input').value,
                        summary: orderSummary
                    })
                })
                .then(response => response.json())
                .then(dataResponse => {
                    if (dataResponse.status !== 'success') {
                        toastr.error(dataResponse.message, 'Erro', {
                            closeButton: true,
                            progressBar: true
                        });
                    } else {
                        Swal.fire({
                            title: "Sucesso",
                            text: "Venda registrada com sucesso",
                            icon: "success",
                            confirmButtonText: "OK"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });

                    }
                })
        }
    })
</script>
@endsection