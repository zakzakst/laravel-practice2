<?php

namespace App\Console;

use App\Person;
use App\Jobs\MyJob;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Storage;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        $count = Person::all()->count();
        $id = rand(0, $count) + 1;
        $obj = new ScheduleObj($id);
        $schedule->call($obj);
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

class ScheduleObj
{
    private $person;

    public function __construct($id) {
        $this->person = Person::find($id);
    }

    public function __invoke() {
        Storage::append('person_access_log.txt', $this->person->all_data);
        MyJob::dispatch($this->person);
        return 'true';
    }
}