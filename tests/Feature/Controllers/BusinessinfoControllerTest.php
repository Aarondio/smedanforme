<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Businessinfo;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BusinessinfoControllerTest extends TestCase
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
    public function it_displays_index_view_with_businessinfos(): void
    {
        $businessinfos = Businessinfo::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('businessinfos.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.businessinfos.index')
            ->assertViewHas('businessinfos');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_businessinfo(): void
    {
        $response = $this->get(route('businessinfos.create'));

        $response->assertOk()->assertViewIs('app.businessinfos.create');
    }

    /**
     * @test
     */
    public function it_stores_the_businessinfo(): void
    {
        $data = Businessinfo::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('businessinfos.store'), $data);

        $this->assertDatabaseHas('businessinfos', $data);

        $businessinfo = Businessinfo::latest('id')->first();

        $response->assertRedirect(route('businessinfos.edit', $businessinfo));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_businessinfo(): void
    {
        $businessinfo = Businessinfo::factory()->create();

        $response = $this->get(route('businessinfos.show', $businessinfo));

        $response
            ->assertOk()
            ->assertViewIs('app.businessinfos.show')
            ->assertViewHas('businessinfo');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_businessinfo(): void
    {
        $businessinfo = Businessinfo::factory()->create();

        $response = $this->get(route('businessinfos.edit', $businessinfo));

        $response
            ->assertOk()
            ->assertViewIs('app.businessinfos.edit')
            ->assertViewHas('businessinfo');
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

        $response = $this->put(
            route('businessinfos.update', $businessinfo),
            $data
        );

        $data['id'] = $businessinfo->id;

        $this->assertDatabaseHas('businessinfos', $data);

        $response->assertRedirect(route('businessinfos.edit', $businessinfo));
    }

    /**
     * @test
     */
    public function it_deletes_the_businessinfo(): void
    {
        $businessinfo = Businessinfo::factory()->create();

        $response = $this->delete(
            route('businessinfos.destroy', $businessinfo)
        );

        $response->assertRedirect(route('businessinfos.index'));

        $this->assertModelMissing($businessinfo);
    }
}
