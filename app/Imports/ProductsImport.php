<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function __construct(int $id)
    {
        $this->id = $id;
    }
    
    
    public function model(array $row)
    {   
        if ($row[1] == $this->id) {
            
            return new Product([ 
                
                'id' => intval($row[0]),
                'list_id' => intval($row[1]),
                'name' => $row[2],
                'price' => doubleval($row[3]),
                'code' => $row[4],
               
               
               
                ]); 
            }
        }

        
}
