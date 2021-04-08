<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /*
    public function query()
    {
        return Product::query()->where('list_id','=',$this->id);
    }
    */

    public function headings(): array
    {
        return [
            'id',
            'list_id',
            'name', 
            'price',
            'code',
        ]; 
    }

    public function collection()
    {
        return Product::where('list_id','=',$this->id)->get();
    }
}
