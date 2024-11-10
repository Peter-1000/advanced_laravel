<?php


namespace App\Services;


use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\ProductReview;

class ProductService
{

    public function getProducts(): \Illuminate\Database\Eloquent\Collection
    {
        return Product::all();
    }

    public function getProductById(int $productId): \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Builder|array|null
    {
        return Product::find($productId)->first();
    }

    public function createProduct(array $data): \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Builder
    {
        $data['user_id'] = auth()->id();
        $product         = Product::query()->create($data);
        $product->details()->create($data);
        return $product;
    }

    public function updateProduct(int $productId, array $data): \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Builder|array|null
    {
        $data['user_id'] = auth()->id();
        $product         = $this->getProductById($productId);

        $product->title          = $data['title'];
        $product->description    = $data['description'];
        $product->user_id        = $data['user_id'];
        $product->details->size  = $data['size'];
        $product->details->price = $data['price'];
        $product->details->color = $data['color'];
        $product->save();
        $product->details->save();
        return $product;
    }

    public function deleteProduct(int $productId)
    {
        $product = $this->getProductById($productId);

        if ($product->details) {
            $product->details->delete();
        }

        if ($product->reviews) {
            $product->reviews->delete();
        }

        if ($product->imagable) {
            $product->imagable->delete();
        }

        $product->delete();
    }

}