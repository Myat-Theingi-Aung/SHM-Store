<?php

namespace App\Contracts\Services\Product;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Product
 */
interface ProductServiceInterface
{
    /**
    * To get post list
    * @return $postList
    */
    public function index();

    /**
    * To show product create view
    * @param $category Category information
    * @return product create view
    */
    public function create();

    /**
    * To store product
    * @param Request $request request with inputs
    * @return Object $product store product
    */
	public function store(Request $request);

    /**
    * To delete product by id
    * @param string $id product id
    * @return string $message message success or not
    */
	public function destroy($id);

    /**
    * To show product details
    * @param string $id product id
    * @return Object $product to show product details
    */
    public function show($id);

    /**
    * To show product edit view
    * @param string $id product id
    * @return product edit view
    */
    public function edit($id);

    /**
    * To update product by id
    * @param Request $request request with inputs
    * @param string $id product id
    * @return Object $product Product Object
    */
    public function update(Request $request,$id);

    /**
    * To import product information
    * 
    * @return add excel data db
    */
    public function import(Request $request);

    /**
    * To export product information
    * 
    * @return excel file
    */
    public function export();
}