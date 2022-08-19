<?php

namespace App\Services\Product;

use Illuminate\Support\Facades\Request;
use App\Contracts\Dao\Product\ProductDaoInterface;
use App\Contracts\Services\Product\ProductServiceInterface;

class ProductService implements ProductServiceInterface
{
    private $productDao;

    public function __construct(ProductDaoInterface $productDao)
    {
        $this->productDao = $productDao;
    }

    public function index()
    {
        return $this->productDao->index();
    }

    public function create()
    {
        return $this->productDao->create();
    }

    public function store($validated)
    {
        return $this->productDao->store($validated);
    }

    public function destroy($id)
    {
        return $this->productDao->destroy($id);
    }

    public function edit($id)
    {
        return $this->productDao->edit($id);
    }

    public function update($validated,$id)
    {
        return $this->productDao->update($validated,$id);
    }

    
}