<?php

namespace App\Services;


use GuzzleHttp\Client;

class AbstractHoliday
{
    protected $holidays;

    public function __construct()
    {
        $this->holidays = $this->fetchHolidays();
    }

    protected function fetchHolidays()
    {
        $http = new Client();
        $response = $http->get(config('services.holiday.end_point'),['verify' => false]);

        return json_decode($response->getBody()->getContents());
    }
    public function getHolidays()
    {
        return $this->holidays;
    }
}
