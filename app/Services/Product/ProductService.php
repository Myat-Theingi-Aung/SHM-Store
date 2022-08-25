<?php

namespace App\Services\Product;

use Illuminate\Http\Request;
use App\Contracts\Dao\Product\ProductDaoInterface;
use App\Contracts\Services\Product\ProductServiceInterface;

/**
 * Service class for product.
 */
class ProductService implements ProductServiceInterface
{
    /**
    * porduct dao
    */
    private $productDao;

    /**
    * Class Constructor
    * @param ProductDaoInterface
    * @return
    */
    public function __construct(ProductDaoInterface $productDao)
    {
        $this->productDao = $productDao;
    }

    /**
    * To get porduct list
    * @return array $products Product list
    */
    public function index()
    {
        return $this->productDao->index();
    }

    /**
    * To show product create view
    * @param $category Category information
    * @return array product create view
    */
    public function create()
    {
        return $this->productDao->create();
    }

    /**
    * To store product
    * @param Request $validated request with inputs
    * @return Object $product saved product
    */
    public function store($validated)
    {
        return $this->productDao->store($validated);
    }

    /**
    * To destroy porduct by id
    * @param string $id product id
    * @return string $message message success or not
   */
    public function destroy($id)
    {
        return $this->productDao->destroy($id);
    }

    /**
    * To eidt product
    * @param $product product data
    * @return product edit view
    */
    public function edit($id)
    {
        return $this->productDao->edit($id);
    }

    /**
    * To show product details view
    * @param $product Product information
    * @return array product show view
    */
    public function show($id)
    {
        return $this->productDao->show($id);
    }

    /**
    * To update product by id
    * @param $validated request with inputs
    * @param string $id Product id
    * @return Object $prodcut Product Object
   */
    public function update($validated,$id)
    {
        return $this->productDao->update($validated,$id);
    }

    /**
    * To import product information
    * 
    * @return add excel data db
    */
    public function import($validated){
        return $this->productDao->import($validated);
    }

    /**
    * To export product information
    * 
    * @return excel file
    */
    public function export(){
        return $this->productDao->export();
    }
}