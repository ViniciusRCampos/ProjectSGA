<?php

namespace App\Repository\Model;

use App\Models\Sale;
use Carbon\Carbon;

class SaleRepository extends ModelRepository
{
    public function __construct(Sale $sale)
    {
        parent::__construct($sale);
    }

    public function createWithSummary(array $data, array $summary)
    {
        $sale = $this->model->create($data);
        foreach($summary as $item){
            $sale->products()->attach([
                $item['id'] => ['quantity' => $item['quantity']],
            ]);
        }
        return $sale;
    }

    public function getReportData(array $filters = []){
        $query = $this->model->select([
            'sales.id',
            'stores.name as store_name',
            'clients.name as client_name',
            'sellers.name as seller_name',
            'sales.total_price',
            'sales.total_itens',
            'payment_methods.name as payment_method',
            'sales.observation'
        ])
        ->join('sellers', 'sales.seller_id', '=', 'sellers.id')
        ->join('stores', 'sales.store_id', '=', 'stores.id')
        ->join('clients', 'sales.client_id', '=', 'clients.id')
        ->join('payment_methods', 'sales.payment_id', '=', 'payment_methods.id');
    
        $query->when(!empty($filters['clientId']), fn($q) => $q->where('sales.client_id', $filters['clientId']))
        ->when(!empty($filters['sellerId']), fn($q) => $q->where('sales.seller_id', $filters['sellerId']))
        ->when(!empty($filters['storeId']), fn($q) => $q->where('sales.store_id', $filters['storeId']))
        ->when(!empty($filters['date']), function ($q) use ($filters) {
            $startOfDay = Carbon::parse($filters['date'])->startOfDay();
            $endOfDay = Carbon::parse($filters['date'])->endOfDay();
            $q->whereBetween('sales.created_at', [$startOfDay, $endOfDay]);
        });

    $sales = $query->get();
    return $sales;
    }
}