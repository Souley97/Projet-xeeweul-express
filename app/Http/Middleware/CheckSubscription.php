<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSubscription
{

     /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        // Vérifiez si l'utilisateur est abonné et que l'abonnement est toujours actif
        if (!$user || !$user->subscriptions()->where('end_date', '>', now())->exists()) {
            return redirect()->route('subscription.plans')->with('error', 'Vous devez vous abonner pour accéder à ce contenu.');
        }

        return $next($request);
    }
}

