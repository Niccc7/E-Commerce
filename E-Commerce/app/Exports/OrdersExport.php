<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrdersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Order::all();
    }
    public function headings(): array
    {
        return ["No", "Subtotal", "Diskon", "Total", "Delivered_date", "Canceled_date", "Status_order", "pembeli", "Purchase_date", "updated_at"];
    }
}
