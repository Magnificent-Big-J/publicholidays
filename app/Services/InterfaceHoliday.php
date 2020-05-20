<?php
namespace App\Services;

interface InterfaceHoliday {
    public function extractDate($response) : string;
    public function extractHoliday($response) : string;
}
