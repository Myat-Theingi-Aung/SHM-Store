<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $id = Category::where('id',$row[1])->first()->id;
        return new Product([
            'category_id' => $id,
            'name' => $row[2],
            'brand' => $row[3],
            'original_price' => $row[4],
            'offer_price' => $row[5],
            'description' => $row[7],
        ]);
    }
}
