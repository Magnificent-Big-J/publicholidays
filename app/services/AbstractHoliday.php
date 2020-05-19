<?php

namespace App\services;


class abstractHoliday
{
    protected $holidays;

    public function __construct()
    {
        $this->holidays = $this->fetchHolidays();
    }

    protected function fetchHolidays()
    {
        $cURLConnection = curl_init();

        curl_setopt($cURLConnection, CURLOPT_URL, 'https://kayaposoft.com/enrico/json/v2.0/?action=getHolidaysForYear&year=2020&country=zaf&holidayType=public_holiday');
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

        $holidayResponse = curl_exec($cURLConnection);
        curl_close($cURLConnection);

        $jsonArrayResponse = json_decode($holidayResponse);

        return $jsonArrayResponse;
    }
    public function getHolidays()
    {
        return $this->holidays;
    }
}
