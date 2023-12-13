<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SetReservationUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Set created_by and updated_by for new records
            if ($request->isMethod('post')) {
                $request->merge([
                    'created_by' => $user->id,
                    'updated_by' => $user->id,
                ]);
            }
            // Set updated_by for updated records
            elseif ($request->isMethod('put') || $request->isMethod('patch')) {
                $request->merge(['updated_by' => $user->id]);
            }
        }
        return $next($request);
    }
}
