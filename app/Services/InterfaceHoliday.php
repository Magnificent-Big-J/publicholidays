<?php
namespace App\services;

interface interfaceHoliday {
    public function extractDate($response) : string;
    public function extractHoliday($response) : string;
}
