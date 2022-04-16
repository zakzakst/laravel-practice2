<?php

namespace App\Console;

use App\Person;
use App\Jobs\MyJob;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        $count = Person::all()->count();
        $id = rand(0, $count) + 1;
        $schedule->call(function() use ($id) {
            $person = Person::find($id);
            MyJob::dispatch($person);
        });
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
