<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\PublicHolidays;
use App\Services\Holidays;

class Holiday extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'holidays:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch Public Holiday';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        if (!$this->checkImport()) {
            $obj = new Holidays();
            $holidays = $obj->getHolidays();

            foreach ($holidays as $holiday) {

                $date = $obj->extractDate($holiday);
                $name = $obj->extractHoliday($holiday);

                PublicHolidays::create([
                    'name' => $name,
                    'holiday_date' => $date
                ]);
                $this->info("Created Holiday {$name} date : $date");
            }

        } else {
            $this->info("Holidays have already been  imported");
        }
        $this->info('Thank you, public holidays have been imported');
    }
    private function checkImport()
    {
        //Check if holidays table already have data
        return PublicHolidays::count() ? true : false;

    }
}
