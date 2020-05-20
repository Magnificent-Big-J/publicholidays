<?php

namespace Tests\Feature;

use App\PublicHolidays;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HolidayTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_view_holidays()
    {
        $holiday1 = factory(PublicHolidays::class)->create();
        $holiday2 = factory(PublicHolidays::class)->create();
        $response = $this->get('/');
        $response->assertStatus(200);

        $response->assertSee($holiday1->name);
        $response->assertSee($holiday2->name);

        $this->assertDatabaseCount('holidays', PublicHolidays::count());
    }
}
