<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Cashlow;

use App\Models\Businessinfo;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CashlowTest extends TestCase
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
    public function it_gets_cashlows_list(): void
    {
        $cashlows = Cashlow::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.cashlows.index'));

        $response->assertOk()->assertSee($cashlows[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_cashlow(): void
    {
        $data = Cashlow::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.cashlows.store'), $data);

        $this->assertDatabaseHas('cashlows', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.cashlows.update', $cashlow),
            $data
        );

        $data['id'] = $cashlow->id;

        $this->assertDatabaseHas('cashlows', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_cashlow(): void
    {
        $cashlow = Cashlow::factory()->create();

        $response = $this->deleteJson(route('api.cashlows.destroy', $cashlow));

        $this->assertModelMissing($cashlow);

        $response->assertNoContent();
    }
}
