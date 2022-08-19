<?php

namespace App\Contracts\Dao\Product;

use Illuminate\Support\Facades\Request;

interface ProductDaoInterface
{
    public function index();
    public function create();
	public function store(Request $request);
	public function destroy($id);
    public function edit($id);
    public function update(Request $request,$id);
}