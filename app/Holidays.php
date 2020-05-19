<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Holidays extends Model
{
    protected $guarded = [];
    protected $dates = ['holiday_date'];

    public function setDobAttribute($holiday_date)
    {
        $this->attributes['holiday_date'] = Carbon::parse($holiday_date);
    }
    public function getHolidayDateAttribute()
    {
        return $this->holiday_date->format('l, jS  F Y');
    }
}
