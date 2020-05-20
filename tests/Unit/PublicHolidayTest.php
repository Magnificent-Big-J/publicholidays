<?php

namespace Tests\Unit;


use App\PublicHolidays;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class PublicHolidayTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_can_import_holidays()
    {

        Http::fake([
           config('services.holiday.end_point') => Http::response()
        ]);
        $this->artisan('holidays:fetch')
            ->expectsOutput('Thank you, public holidays have been imported')
            ->assertExitCode(0);

        $this->assertCount(13, PublicHolidays::all());
    }

    private function getData(){
        return '[{"date":{"day":1,"month":1,"year":2020,"dayOfWeek":3},"name":[{"lang":"en","text":"New Year\'s Day"}],"holidayType":"public_holiday"},{"date":{"day":21,"month":3,"year":2020,"dayOfWeek":6},"name":[{"lang":"en","text":"Human Rights Day"}],"holidayType":"public_holiday"},{"date":{"day":10,"month":4,"year":2020,"dayOfWeek":5},"name":[{"lang":"en","text":"Good Friday"}],"holidayType":"public_holiday"},{"date":{"day":13,"month":4,"year":2020,"dayOfWeek":1},"name":[{"lang":"en","text":"Family Day"}],"holidayType":"public_holiday"},{"date":{"day":27,"month":4,"year":2020,"dayOfWeek":1},"name":[{"lang":"en","text":"Freedom Day"}],"holidayType":"public_holiday"},{"date":{"day":1,"month":5,"year":2020,"dayOfWeek":5},"name":[{"lang":"en","text":"Workers\' Day"}],"holidayType":"public_holiday"},{"date":{"day":16,"month":6,"year":2020,"dayOfWeek":2},"name":[{"lang":"en","text":"Youth Day"}],"holidayType":"public_holiday"},{"date":{"day":9,"month":8,"year":2020,"dayOfWeek":7},"name":[{"lang":"en","text":"National Women\'s Day"}],"holidayType":"public_holiday"},{"date":{"day":10,"month":8,"year":2020,"dayOfWeek":1},"name":[{"lang":"en","text":"National Women\'s Day"}],"flags":["ADDITIONAL_HOLIDAY"],"holidayType":"public_holiday"},{"date":{"day":24,"month":9,"year":2020,"dayOfWeek":4},"name":[{"lang":"en","text":"Heritage Day"}],"holidayType":"public_holiday"},{"date":{"day":16,"month":12,"year":2020,"dayOfWeek":3},"name":[{"lang":"en","text":"Day of Reconciliation"}],"holidayType":"public_holiday"},{"date":{"day":25,"month":12,"year":2020,"dayOfWeek":5},"name":[{"lang":"en","text":"Christmas Day"}],"holidayType":"public_holiday"},{"date":{"day":26,"month":12,"year":2020,"dayOfWeek":6},"name":[{"lang":"en","text":"Day of Goodwill"}],"holidayType":"public_holiday"}]';
    }
}
