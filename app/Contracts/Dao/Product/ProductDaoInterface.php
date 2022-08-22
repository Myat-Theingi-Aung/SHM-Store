<?php

namespace App\Contracts\Dao\Product;

use Illuminate\Http\Request;

interface ProductDaoInterface
{
    public function index();
    public function create();
	public function store(Request $request);
	public function destroy($id);
    public function show($id);
    public function edit($id);
    public function update(Request $request,$id);
}