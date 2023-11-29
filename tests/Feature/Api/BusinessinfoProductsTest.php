<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Product;
use App\Models\Businessinfo;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BusinessinfoProductsTest extends TestCase
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
    public function it_gets_businessinfo_products(): void
    {
        $businessinfo = Businessinfo::factory()->create();
        $products = Product::factory()
            ->count(2)
            ->create([
                'businessinfo_id' => $businessinfo->id,
            ]);

        $response = $this->getJson(
            route('api.businessinfos.products.index', $businessinfo)
        );

        $response->assertOk()->assertSee($products[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_businessinfo_products(): void
    {
        $businessinfo = Businessinfo::factory()->create();
        $data = Product::factory()
            ->make([
                'businessinfo_id' => $businessinfo->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.businessinfos.products.store', $businessinfo),
            $data
        );

        $this->assertDatabaseHas('products', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $product = Product::latest('id')->first();

        $this->assertEquals($businessinfo->id, $product->businessinfo_id);
    }
}
