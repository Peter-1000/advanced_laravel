<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromArray;

class ProductsExport implements FromArray
{

    public function array(): array
    {
        $list     = [];
        $products = Product::all();

        foreach ($products as $key => $product) {
            $list[] = [$key + 1, $product->title, $product->description, $product->user->name];
        }


        return $list;
    }
}
