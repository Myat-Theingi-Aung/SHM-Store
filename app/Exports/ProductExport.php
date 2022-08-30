<?php

namespace App\Exports;

use App\Models\Product;
use App\Models\Category;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements WithHeadings,FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $productsData = Product::select('category_id','name','brand','original_price','offer_price','photo','description')
                        ->orderBy('category_id','desc')->get();
        foreach($productsData as $key => $product){
            $catName = Category::select('name')->where('id',$product->category_id)->first();
            $productsData[$key]->category_id = $catName->name;
        }
        return $productsData;
    }

    public function headings(): array
    {
        return['Category Name','Product Name','Brand','Original Price','Offer Price','Photo','Product Description'];
    }
}
