<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class PublicHolidays extends Model
{
    protected $guarded = [];
    protected $dates = ['holiday_date'];
    protected $table = 'holidays';

    public function setDobAttribute($holiday_date)
    {
        $this->attributes['holiday_date'] = Carbon::parse($holiday_date);
    }
    public function getPublicHolidayDateAttribute()
    {
        return $this->holiday_date->format('l, jS  F Y');
    }
}
