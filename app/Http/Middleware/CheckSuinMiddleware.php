<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Businessinfo;
use Illuminate\Support\Facades\Auth;

class CheckSuinMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $businessInfo = Businessinfo::where('user_id', $user->id)->where('plan_type', 1)->first();

        if ($businessInfo && !empty($businessInfo->suin)) {
            return $next($request);
        }

        // Check route conditions for exceptions
        $exceptionRoutes = [
            'suin', 'personal', 'getSmedanUser', 'suindetail', 'dashboard', 'activatesuin', 'home','updateinfo','activatesuin'
        ];

        if (in_array($request->route()->getName(), $exceptionRoutes)) {
            return $next($request);
        }

        // Redirect to 'suin' route if SUIN is empty or businessInfo is not available.
        return redirect()->route('suin');
    }
}
