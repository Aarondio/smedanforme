<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Cashlow;

use App\Models\Businessinfo;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CashlowControllerTest extends TestCase
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
    public function it_displays_index_view_with_cashlows(): void
    {
        $cashlows = Cashlow::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('cashlows.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.cashlows.index')
            ->assertViewHas('cashlows');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_cashlow(): void
    {
        $response = $this->get(route('cashlows.create'));

        $response->assertOk()->assertViewIs('app.cashlows.create');
    }

    /**
     * @test
     */
    public function it_stores_the_cashlow(): void
    {
        $data = Cashlow::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('cashlows.store'), $data);

        $this->assertDatabaseHas('cashlows', $data);

        $cashlow = Cashlow::latest('id')->first();

        $response->assertRedirect(route('cashlows.edit', $cashlow));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_cashlow(): void
    {
        $cashlow = Cashlow::factory()->create();

        $response = $this->get(route('cashlows.show', $cashlow));

        $response
            ->assertOk()
            ->assertViewIs('app.cashlows.show')
            ->assertViewHas('cashlow');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_cashlow(): void
    {
        $cashlow = Cashlow::factory()->create();

        $response = $this->get(route('cashlows.edit', $cashlow));

        $response
            ->assertOk()
            ->assertViewIs('app.cashlows.edit')
            ->assertViewHas('cashlow');
    }

    /**
     * @test
     */
    public function it_updates_the_cashlow(): void
    {
        $cashlow = Cashlow::factory()->create();

        $businessinfo = Businessinfo::factory()->create();

        $data = [
            'directin_one' => $this->faker->randomNumber(),
            'directin_two' => $this->faker->randomNumber(),
            'directin_three' => $this->faker->randomNumber(),
            'directin_four' => $this->faker->randomNumber(),
            'indirectin_one' => $this->faker->randomNumber(),
            'indirectin_two' => $this->faker->randomNumber(),
            'indirectin_three' => $this->faker->randomNumber(),
            'indirectin_four' => $this->faker->randomNumber(),
            'wages_one' => $this->faker->randomNumber(),
            'wages_two' => $this->faker->randomNumber(),
            'wages_three' => $this->faker->randomNumber(),
            'wages_four' => $this->faker->randomNumber(),
            'capitalcost_one' => $this->faker->randomNumber(),
            'capitalcost_two' => $this->faker->randomNumber(),
            'capitalcost_three' => $this->faker->randomNumber(),
            'capitalcost_four' => $this->faker->randomNumber(),
            'businessinfo_id' => $businessinfo->id,
        ];

        $response = $this->put(route('cashlows.update', $cashlow), $data);

        $data['id'] = $cashlow->id;

        $this->assertDatabaseHas('cashlows', $data);

        $response->assertRedirect(route('cashlows.edit', $cashlow));
    }

    /**
     * @test
     */
    public function it_deletes_the_cashlow(): void
    {
        $cashlow = Cashlow::factory()->create();

        $response = $this->delete(route('cashlows.destroy', $cashlow));

        $response->assertRedirect(route('cashlows.index'));

        $this->assertModelMissing($cashlow);
    }
}
