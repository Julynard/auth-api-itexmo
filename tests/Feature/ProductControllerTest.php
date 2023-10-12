<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductControllerTest extends TestCase
{
    public function test_prod_index()
    {
        $response = $this->get('/api/products'); //    
        $response->assertStatus(200);
    }

    public function test_prod_store()
    {
        $data = [
            'name' => 'Test Product',
            'price' => 10.99,
        ];

        $response = $this->post('/api/products', $data);

        $response->assertStatus(200)->assertJson(['message' => 'Product added successfully!']);

    }

    public function test_prod_show()
    {
        $prod = Product::factory()->create();
        $response = $this->get("/api/products/{$prod->id}");

        $response->assertStatus(200);
    }

    public function test_prod_update()
    {
        $prod = Product::factory()->create();
        $newData = [
            'name' => 'Test Product',
            'price' => 10.99,
        ];

        $response = $this->put("/api/products/{$prod->id}", $newData);

        $response->assertStatus(200)->assertJson(['message' => 'Product updated successfully!']);
    }

    public function test_prod_delete()
    {
        $prod = Product::factory()->create();

        $response = $this->delete("/api/products/{$prod->id}");

        $response->assertStatus(200)->assertJson(['message' => 'Product deleted successfully']);

    }
}
