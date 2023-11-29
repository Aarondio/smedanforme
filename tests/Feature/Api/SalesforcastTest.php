<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Salesforcast;

use App\Models\Product;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SalesforcastTest extends TestCase
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
    public function it_gets_salesforcasts_list(): void
    {
        $salesforcasts = Salesforcast::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.salesforcasts.index'));

        $response->assertOk()->assertSee($salesforcasts[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_salesforcast(): void
    {
        $data = Salesforcast::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.salesforcasts.store'), $data);

        $this->assertDatabaseHas('salesforcasts', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_salesforcast(): void
    {
        $salesforcast = Salesforcast::factory()->create();

        $product = Product::factory()->create();

        $data = [
            'jan_price' => $this->faker->randomNumber(2),
            'feb_price' => $this->faker->randomNumber(2),
            'mar_price' => $this->faker->randomNumber(2),
            'aprile_price' => $this->faker->randomNumber(2),
            'may_price' => $this->faker->randomNumber(2),
            'jun_price' => $this->faker->randomNumber(2),
            'jul_price' => $this->faker->randomNumber(2),
            'aug_price' => $this->faker->randomNumber(2),
            'sep_price' => $this->faker->randomNumber(2),
            'oct_price' => $this->faker->randomNumber(2),
            'nov_price' => $this->faker->randomNumber(2),
            'dec_price' => $this->faker->randomNumber(2),
            'jan_qty' => $this->faker->randomNumber(),
            'feb_qty' => $this->faker->randomNumber(),
            'mar_qty' => $this->faker->randomNumber(),
            'apr_qty' => $this->faker->randomNumber(),
            'may_qty' => $this->faker->randomNumber(),
            'jun_qty' => $this->faker->randomNumber(),
            'jul_qty' => $this->faker->randomNumber(),
            'aug_qty' => $this->faker->randomNumber(),
            'sep_qty' => $this->faker->randomNumber(),
            'oct_qty' => $this->faker->randomNumber(),
            'nov_qty' => $this->faker->randomNumber(),
            'dec_qty' => $this->faker->randomNumber(),
            'jan_cost' => $this->faker->randomNumber(2),
            'feb_cost' => $this->faker->randomNumber(2),
            'mar_cost' => $this->faker->randomNumber(2),
            'apr_cost' => $this->faker->randomNumber(2),
            'may_cost' => $this->faker->randomNumber(2),
            'jun_cost' => $this->faker->randomNumber(2),
            'jul_cost' => $this->faker->randomNumber(2),
            'aug_cost' => $this->faker->randomNumber(2),
            'sep_cost' => $this->faker->randomNumber(2),
            'oct_cost' => $this->faker->randomNumber(2),
            'nov_cost' => $this->faker->randomNumber(2),
            'dec_cost' => $this->faker->randomNumber(2),
            'product_id' => $product->id,
        ];

        $response = $this->putJson(
            route('api.salesforcasts.update', $salesforcast),
            $data
        );

        $data['id'] = $salesforcast->id;

        $this->assertDatabaseHas('salesforcasts', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_salesforcast(): void
    {
        $salesforcast = Salesforcast::factory()->create();

        $response = $this->deleteJson(
            route('api.salesforcasts.destroy', $salesforcast)
        );

        $this->assertModelMissing($salesforcast);

        $response->assertNoContent();
    }
}
