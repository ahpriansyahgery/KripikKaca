<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportOrder implements FromCollection,WithHeadings, WithStyles, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $orders = Order::with('user','checkout','orderitems.product','orderitems.productvarians')->get();
        $orders = $orders->map(function($order, $index){
            foreach ($order->orderitems as $orderitem) {
          
                return[
                   'No'   => $index + 1,
                   'Name' => $order->user->name,
                   'Email' => $order->user->email,
                   'No hp' => $order->checkout->no_hp,
                   'Alamat' => $order->checkout->address,
                   'Product' => $orderitem->product->name,
                   'Total Harga' => $order->total_harga,
                   'Status' => $order->is_paid,
                ];
            }
        });
        return $orders;
    }

    public function headings() : array
    {
        return [
            'No','nama','Email','No hp','Alamat','Product','Total Harga','Status'
        ];
    }
    public function styles(Worksheet $sheet)
    {
        return [
            // Styling untuk header pada baris pertama (kolom header)
            1    => [
                'font' => ['bold' => true, 'size' => 12],  // Teks bold dan ukuran font 12
                'fill' => ['fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, 'color' => ['rgb' => 'FFEB9C']], // Latar belakang kuning terang
                'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],  // Rata tengah
            ],
        ];
    }
  


    public function title(): string
    {
        return 'orders';
    }
}
