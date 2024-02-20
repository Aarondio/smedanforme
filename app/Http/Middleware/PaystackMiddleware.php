<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Paystack;
use Illuminate\Support\Facades\Auth;
class PaystackMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user(); // Assuming the user is authenticated

        $paystack = Paystack::where('user_id', $user->id)
            ->where('plan_type', 1)
            ->first();

        if ($paystack) {
            return $next($request);
        } else {
            return redirect()->route('purchasenbp');
        }
    }
}
