<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Product;
use App\Mail\OrderNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_cus_index()
    {
        $response = $this->get('/api/customers'); // Assuming your route is /api/users
    
        $response->assertStatus(200);
    }

    public function test_cus_show()
    {
        $user = User::factory()->create();
        $response = $this->get("/api/customers/{$user->id}");

        $response->assertStatus(200);
    }

    public function test_cus_update()
    {
        $user = User::factory()->create();
        $newData = [
            'fname' => 'John',
            'lname' => 'Doe'
        ];

        $response = $this->put("/api/customers/{$user->id}", $newData);

        $response->assertStatus(200)->assertJson(['message' => 'User updated successfully!']);
    }

    public function test_cus_delete()
    {
        $user = User::factory()->create();

        $response = $this->delete("/api/customers/{$user->id}");

        $response->assertStatus(200)->assertJson(['message' => 'User deleted successfully']);

    }

    public function test_cus_checkout()
    {
        Mail::fake();

        // Assuming you have some products available for testing
        $productIds = [1, 2, 3]; // Assuming these are valid product IDs
        $email = 'test@example.com';

        $response = $this->post('/api/checkout', [
            'productIds' => $productIds,
            'userEmail' => $email
        ]);

        $response->assertStatus(200)
            ->assertJson(['message' => 'Order processed successfully']);

        Mail::assertQueued(OrderNotification::class, function ($mail) use ($productIds, $email) {
            return $mail->hasTo('tagoonjulynard@gmail.com') && $mail->userEmail === $email;
        });
    }


}
