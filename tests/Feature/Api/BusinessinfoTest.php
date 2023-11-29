<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Businessinfo;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BusinessinfoTest extends TestCase
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
    public function it_gets_businessinfos_list(): void
    {
        $businessinfos = Businessinfo::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.businessinfos.index'));

        $response->assertOk()->assertSee($businessinfos[0]->business_name);
    }

    /**
     * @test
     */
    public function it_stores_the_businessinfo(): void
    {
        $data = Businessinfo::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.businessinfos.store'), $data);

        $this->assertDatabaseHas('businessinfos', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_businessinfo(): void
    {
        $businessinfo = Businessinfo::factory()->create();

        $user = User::factory()->create();

        $data = [
            'business_name' => $this->faker->text(255),
            'audience_need' => $this->faker->text(),
            'business_model' => $this->faker->text(),
            'target_market' => $this->faker->text(),
            'competition_ad' => $this->faker->text(),
            'management_team' => $this->faker->text(),
            'loan_amount' => $this->faker->randomNumber(),
            'loan_reason' => $this->faker->text(255),
            'user_id' => $user->id,
        ];

        $response = $this->putJson(
            route('api.businessinfos.update', $businessinfo),
            $data
        );

        $data['id'] = $businessinfo->id;

        $this->assertDatabaseHas('businessinfos', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_businessinfo(): void
    {
        $businessinfo = Businessinfo::factory()->create();

        $response = $this->deleteJson(
            route('api.businessinfos.destroy', $businessinfo)
        );

        $this->assertModelMissing($businessinfo);

        $response->assertNoContent();
    }
}
