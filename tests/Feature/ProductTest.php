<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    protected array $product;
    protected array $headers;
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->product = [
            'title'       => 'Test Product',
            'description' => 'Testing',
            'user_id'     => 1,
            'size'        => 30,
            'color'       => 'red'
        ];

        $this->headers = [
            'Accept' => 'Application/json',
            //            'Authorization' => 'Bearer 4|431OYAAzOCEJq9WP2e5r2rQ48h8sMPdqX4ScJbIg'
        ];

        $this->user = User::query()->first();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_product_without_auth()
    {
        $response = $this->get('/api/products', $this->headers);
        $response->assertStatus(401);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_product_with_auth()
    {
        $response = $this->actingAs($this->user)->get('/api/products', $this->headers);
        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_product()
    {
        $response = $this->actingAs($this->user)->post('/api/products', $this->product, $this->headers);
        $response->assertStatus(200);
    }
}
