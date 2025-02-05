@extends('layouts.master')

@section('title', 'SGA - Relatorio')

@section('page-style')
@endsection


@section('content')

<div class="container-fluid">
    <h2 class="title">Relatorio - Vendas</h2>
    <dvi class="row">
        <div class="col-12">
            <div class="card">
                <div class="row m-0">
                    <div class="col-12">
                        <h5 class="card-title text-secondary mt-1 mb-0">Filtros</h5>
                        <hr class="my-1">
                    </div>
                    <div class="col-lg-2 col-12 mb-2">
                        <label for="filtro_data" class="mb-0 d-block">Data</label>
                        <input type="date" name="filtro_data" id="filtro_data" class="form-control">
                    </div>
                    <div class="col-lg-3 col-12 mb-2">
                        <label for="cliente_select" class="mb-0">Cliente</label>
                        <select name="cliente_select" id="cliente_select" class="form-control pl-1">
                            <option selected value="">Selecione o Cliente</option>
                            @isset($data['clients'])
                            @foreach ($data['clients'] as $client)
                            <option value="{{$client->id}}" data-active={{$client->active}}>{{$client->name}}</option>
                            @endforeach
                            @endisset
                        </select>
                    </div>
                    <div class="col-lg-3 col-12 mb-2">
                        <label for="filtro_loja" class="mb-0">Loja</label>
                        <select name="filtro_loja" id="filtro_loja" class="form-control pl-1">
                            <option selected value="">Selecione</option>
                            @isset($data['stores'])
                            @foreach ($data['stores'] as $store)
                            <option value="{{$store->id}}" data-active={{$store->active}}>{{$store->name}}</option>
                            @endforeach
                            @endisset
                        </select>
                    </div>
                    <div class="col-lg-3 col-12 mb-2">
                        <label for="vendedor_filtro" class="mb-0">Vendedor</label>
                        <select name="vendedor_filtro" id="vendedor_filtro" class="form-control pl-1">
                            <option selected value="">Selecione</option>
                            @isset($data['sellers'])
                            @foreach ($data['sellers'] as $seller)
                            <option value="{{$seller->id}}" data-active={{$seller->active}}>{{$seller->name}}</option>
                            @endforeach
                            @endisset
                        </select>
                    </div>
                    <div class="col-lg-1 col-12 mb-2 d-flex align-items-end justify-content-end">
                        <div class="">
                            <button class="btn btn-primary" id="filtrar">Filtrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mt-2">
            <div class="card">
                <div class="row m-0">
                    <div class="col-12">
                        <h5 class="card-title text-secondary mt-1 mb-1">Registros</h5>
                    </div>
                    <div class="col-12 mb-2">
                        <div class="table-responsive border">
                            <table class="table table-bordered mb-0" id="tabela_vendas">
                                <thead>
                                    <th scope="col">#</th>
                                    <th scope="col">ID Venda</th>
                                    <th scope="col">Nome Loja</th>
                                    <th scope="col">Nome Cliente</th>
                                    <th scope="col">Nome Vendedor</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Qtd. Produtos</th>
                                    <th scope="col">Forma pagamento</th>
                                    <th scope="col">Observação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($data['tableData'])
                                    <tr>
                                        @foreach ($data['tableData'] as $row)
                                        <td ></td>
                                        <td >{{$row['id']}}</td>
                                        <td >{{$row['store_name']}}</td>
                                        <td >{{$row['client_name']}}</td>
                                        <td >{{$row['seller_name']}}</td>
                                        <td >{{$row['total_price']}}</td>
                                        <td >{{$row['total_itens']}}</td>
                                        <td >{{$row['payment_method']}}</td>
                                        <td >{{$row['observation']}}</td>
                                        @endforeach
                                    </tr>
                                    @endisset
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </dvi>
</div>

@endsection
@section('page-script')
<script>
</script>
@endsection