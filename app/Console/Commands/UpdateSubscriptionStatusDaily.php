<?php

namespace App\Console\Commands;

use App\Models\Subscriptions;
use Illuminate\Console\Command;

class UpdateSubscriptionStatusDaily extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-subscription-status-daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Recherchez les abonnements expirés
        $subscriptions = Subscriptions::where('end_date', '<', now())
            ->where('status', 'active')
            ->get();

        // Mettez à jour le statut des abonnements expirés
        foreach ($subscriptions as $subscription) {
            $subscription->status = 'expired';
            $subscription->save();
        }

        $this->info('Subscription status updated successfully.');
    }

}
