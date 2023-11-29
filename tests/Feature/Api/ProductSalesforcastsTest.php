<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Product;
use App\Models\Salesforcast;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductSalesforcastsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_product_salesforcasts(): void
    {
        $product = Product::factory()->create();
        $salesforcasts = Salesforcast::factory()
            ->count(2)
            ->create([
                'product_id' => $product->id,
            ]);

        $response = $this->getJson(
            route('api.products.salesforcasts.index', $product)
        );

        $response->assertOk()->assertSee($salesforcasts[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_product_salesforcasts(): void
    {
        $product = Product::factory()->create();
        $data = Salesforcast::factory()
            ->make([
                'product_id' => $product->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.products.salesforcasts.store', $product),
            $data
        );

        $this->assertDatabaseHas('salesforcasts', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $salesforcast = Salesforcast::latest('id')->first();

        $this->assertEquals($product->id, $salesforcast->product_id);
    }
}
