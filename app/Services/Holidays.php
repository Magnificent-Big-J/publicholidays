<?php
namespace App\Services;

class Holidays extends AbstractHoliday implements InterfaceHoliday
{
    public function __construct()
    {
        parent::__construct();
    }

    public function extractDate($response): string
    {
        $day = $this->checkValue($response->date->{'day'});
        $month = $this->checkValue($response->date->{'month'});
        $year = $this->checkValue($response->date->{'year'});

        return  $year . '-' . $month . '-' .$day;
    }

    public function extractHoliday($response): string
    {
        return $response->name[0]->{'text'};
    }
    private function checkValue($val)
    {
        if ((int)$val < 10) {
            return "0" . $val;
        }

        return  $val;
    }
}
