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
                        <input type="date" name="filtro_data" id="filtro_data" class="form-control filtro" data-name="date">
                    </div>
                    <div class="col-lg-3 col-12 mb-2">
                        <label for="filtro_client" class="mb-0">Cliente</label>
                        <select name="filtro_client" id="filtro_client" class="form-control pl-1 filtro" data-name="clientId">
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
                        <select name="filtro_loja" id="filtro_loja" class="form-control pl-1 filtro" data-name="storeId">
                            <option selected value="">Selecione</option>
                            @isset($data['stores'])
                            @foreach ($data['stores'] as $store)
                            <option value="{{$store->id}}" data-active={{$store->active}}>{{$store->name}}</option>
                            @endforeach
                            @endisset
                        </select>
                    </div>
                    <div class="col-lg-3 col-12 mb-2">
                        <label for="filtro_vendedor" class="mb-0">Vendedor</label>
                        <select name="filtro_vendedor" id="filtro_vendedor" class="form-control pl-1 filtro" data-name="sellerId">
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
                            <button class="btn btn-primary " id="filtrar" disabled>Filtrar</button>
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
                            <table class="table table-bordered mb-0" id="tabela_relatorio">
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
                                        <td></td>
                                        <td>{{$row['id']}}</td>
                                        <td>{{$row['store_name']}}</td>
                                        <td>{{$row['client_name']}}</td>
                                        <td>{{$row['seller_name']}}</td>
                                        <td>{{$row['total_price']}}</td>
                                        <td>{{$row['total_itens']}}</td>
                                        <td>{{$row['payment_method']}}</td>
                                        <td>{{$row['observation']}}</td>
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
    const date = document.getElementById('filtro_data');
    const client = document.getElementById('filtro_cliente');
    const store = document.getElementById('filtro_loja');
    const seller = document.getElementById('filtro_vendedor');
    const btnFilter = document.getElementById('filtrar');
    const today = new Date().toLocaleDateString('en-ca')
    const filterData = {
        'date': '',
        'clientId': '',
        'storeId': '',
        'sellerId': '',
    };
    date.max = today;

    document.querySelectorAll('.filtro').forEach((filter) => {
        filter.addEventListener('change', (e) => {
            const element = e.currentTarget;
            const name = element.getAttribute('data-name');
            const value = element.value;
            filterData[name] = value;

            let values = Object.values(filterData);
            values = values.filter((e) => e != '');
            btnFilter.toggleAttribute('disabled', !values.length > 0)

        })
    })

    btnFilter.addEventListener('click', () => {
        let values = Object.values(filterData);
        values = values.filter((e) => e != '');
        if (values.length == 0) {
            return
        }
        getFilteredTable();

    })

    function createTableRows(data) {
        let tableBody = document.querySelector('#tabela_relatorio tbody');
        data.forEach((row) => {
            let tr = document.createElement('tr')
            tr.innerHTML =
                `<td></td>
            <td>${row.id}</td>
            <td>${row.store_name}</td>
            <td>${row.client_name}</td>
            <td>${row.seller_name}</td>
            <td>R$ ${row.total_price.replace('.', ',')}</td>
            <td>${row.total_itens}</td>
            <td>${row.payment_method}</td>
            <td>${row.observation == null ? '' : row.observation}</td>
            `;
            tableBody.appendChild(tr);
        })
    }



    // fetch

    function getFilteredTable() {
        fetch('/sale/report/filter', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(filterData)
            }).then(response => response.json())
            .then(dataResponse => {
                if (dataResponse.status !== 'success') {
                    toastr.error(dataResponse.message, 'Erro', {
                        closeButton: true,
                        progressBar: true
                    });
                } else {
                    let tableBody = document.querySelector('#tabela_relatorio tbody');
                    tableBody.innerHTML = '';
                    createTableRows(dataResponse.data);
                    toastr.success('Tabela atualizada com sucesso');
                }
            })
    }
</script>
@endsection