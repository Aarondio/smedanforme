<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Businessinfo;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserBusinessinfosTest extends TestCase
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
    public function it_gets_user_businessinfos(): void
    {
        $user = User::factory()->create();
        $businessinfos = Businessinfo::factory()
            ->count(2)
            ->create([
                'user_id' => $user->id,
            ]);

        $response = $this->getJson(
            route('api.users.businessinfos.index', $user)
        );

        $response->assertOk()->assertSee($businessinfos[0]->business_name);
    }

    /**
     * @test
     */
    public function it_stores_the_user_businessinfos(): void
    {
        $user = User::factory()->create();
        $data = Businessinfo::factory()
            ->make([
                'user_id' => $user->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.users.businessinfos.store', $user),
            $data
        );

        $this->assertDatabaseHas('businessinfos', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $businessinfo = Businessinfo::latest('id')->first();

        $this->assertEquals($user->id, $businessinfo->user_id);
    }
}
