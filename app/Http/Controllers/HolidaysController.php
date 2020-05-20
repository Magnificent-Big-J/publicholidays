<?php

namespace App\Http\Controllers;

use App\PublicHolidays;

use PDF;
use Illuminate\Http\Request;
use App\Services\Holidays;

class HolidaysController extends Controller
{
    public function index()
    {
        $holidays = PublicHolidays::all();

        return view('holidays', compact('holidays'));
    }
    public function download()
    {
        $holidays = PublicHolidays::all();
        $pdf = PDF::loadView('downloadPdf', compact('holidays'));
        return $pdf->download('public_holidays.pdf');
    }
}
