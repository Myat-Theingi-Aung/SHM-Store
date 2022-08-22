<?php

namespace App\Contracts\Services\Product;

use Illuminate\Http\Request;

interface ProductServiceInterface
{
    public function index();
    public function create();
	public function store(Request $request);
	public function destroy($id);
    public function show($id);
    public function edit($id);
    public function update(Request $request,$id);
}