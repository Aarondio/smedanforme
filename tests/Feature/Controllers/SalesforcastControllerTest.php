<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Salesforcast;

use App\Models\Product;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SalesforcastControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_salesforcasts(): void
    {
        $salesforcasts = Salesforcast::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('salesforcasts.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.salesforcasts.index')
            ->assertViewHas('salesforcasts');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_salesforcast(): void
    {
        $response = $this->get(route('salesforcasts.create'));

        $response->assertOk()->assertViewIs('app.salesforcasts.create');
    }

    /**
     * @test
     */
    public function it_stores_the_salesforcast(): void
    {
        $data = Salesforcast::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('salesforcasts.store'), $data);

        $this->assertDatabaseHas('salesforcasts', $data);

        $salesforcast = Salesforcast::latest('id')->first();

        $response->assertRedirect(route('salesforcasts.edit', $salesforcast));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_salesforcast(): void
    {
        $salesforcast = Salesforcast::factory()->create();

        $response = $this->get(route('salesforcasts.show', $salesforcast));

        $response
            ->assertOk()
            ->assertViewIs('app.salesforcasts.show')
            ->assertViewHas('salesforcast');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_salesforcast(): void
    {
        $salesforcast = Salesforcast::factory()->create();

        $response = $this->get(route('salesforcasts.edit', $salesforcast));

        $response
            ->assertOk()
            ->assertViewIs('app.salesforcasts.edit')
            ->assertViewHas('salesforcast');
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

        $response = $this->put(
            route('salesforcasts.update', $salesforcast),
            $data
        );

        $data['id'] = $salesforcast->id;

        $this->assertDatabaseHas('salesforcasts', $data);

        $response->assertRedirect(route('salesforcasts.edit', $salesforcast));
    }

    /**
     * @test
     */
    public function it_deletes_the_salesforcast(): void
    {
        $salesforcast = Salesforcast::factory()->create();

        $response = $this->delete(
            route('salesforcasts.destroy', $salesforcast)
        );

        $response->assertRedirect(route('salesforcasts.index'));

        $this->assertModelMissing($salesforcast);
    }
}
