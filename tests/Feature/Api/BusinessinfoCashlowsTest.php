<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Cashlow;
use App\Models\Businessinfo;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BusinessinfoCashlowsTest extends TestCase
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
    public function it_gets_businessinfo_cashlows(): void
    {
        $businessinfo = Businessinfo::factory()->create();
        $cashlows = Cashlow::factory()
            ->count(2)
            ->create([
                'businessinfo_id' => $businessinfo->id,
            ]);

        $response = $this->getJson(
            route('api.businessinfos.cashlows.index', $businessinfo)
        );

        $response->assertOk()->assertSee($cashlows[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_businessinfo_cashlows(): void
    {
        $businessinfo = Businessinfo::factory()->create();
        $data = Cashlow::factory()
            ->make([
                'businessinfo_id' => $businessinfo->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.businessinfos.cashlows.store', $businessinfo),
            $data
        );

        $this->assertDatabaseHas('cashlows', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $cashlow = Cashlow::latest('id')->first();

        $this->assertEquals($businessinfo->id, $cashlow->businessinfo_id);
    }
}
