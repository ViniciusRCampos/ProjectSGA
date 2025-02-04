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
                            <button class='btn p-0 pl-2' data-toggle="modal" data-target="#modal_produto" id="btn_adicionar_produto">
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
                                    <tr>
                                        <th scope="row">
                                            <svg class="text-danger" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-x">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M18 6l-12 12" />
                                                <path d="M6 6l12 12" />
                                            </svg>
                                        </th>
                                        <td>0001</td>
                                        <td>Blusa Oversize</td>
                                        <td>Azul</td>
                                        <td>5</td>
                                        <td>R$ 15,00</td>
                                        <td>R$ 75,00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class='d-flex justify-content-end my-2'>
                            <p class="m-0 mr-1 h4 bold">Total: </p>
                            <span class="border h4">R$ 75,00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mt-2">
            <div class="d-flex justify-content-end">
                <button class='btn btn-primary'>Finalizar</button>
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
    console.log(data);
</script>
@endsection