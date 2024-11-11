<?php

namespace Tests\Unit;

use App\Services\ProductService;
use Tests\TestCase;

class ProductTest extends TestCase
{
    protected ProductService $productService;
    protected array $product;

    protected function setUp(): void
    {
        parent::setUp();

        $this->productService = $this->app->make('App\Services\ProductService');
        $this->product        = [
            'title'       => 'Test Product',
            'description' => 'Testing',
            'user_id'     => 1,
            'size'        => 30,
            'color'       => 'red'
        ];
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_create_product()
    {
        $createdProduct         = $this->productService->createProduct($this->product);
        $this->assertDatabaseHas('App\Models\Product', $createdProduct->toArray());
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_delete_product()
    {
        $this->productService->deleteProduct(13);
        $this->assertDatabaseMissing('App\Models\Product', ['title' => $this->product['title']]);
    }
}
