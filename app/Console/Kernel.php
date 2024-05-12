<?php

namespace App\Console;

use App\Console\Commands\UpdateSubscriptionStatusDaily;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    // protected function schedule(Schedule $schedule): void
    // {
    //     // $schedule->command('inspire')->hourly();
    // }
    protected $commands = [
        \App\Console\Commands\UpdateSubscriptionStatus::class,
    ];

    // protected function schedule(Schedule $schedule)
    // {
    //     $schedule->command('subscriptions:update-status')->hourly();
    // }


    protected function schedule(Schedule $schedule)
    {
        $schedule->command(UpdateSubscriptionStatusDaily::class)->dailyAt('01:00');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
