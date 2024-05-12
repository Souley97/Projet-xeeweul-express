<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Subscription;
use App\Models\Subscriptions;

class UpdateSubscriptionStatus extends Command
{
    protected $signature = 'subscriptions:update-status';
    protected $description = 'Update subscription status';

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
