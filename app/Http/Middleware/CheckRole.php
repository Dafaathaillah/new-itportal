<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        if ($role == 'ict_developer' && auth()->user()->role != 'ict_developer') {
            abort(403);
        } elseif ($role == 'ict_section' && auth()->user()->role != 'ict_section') {
            abort(403);
        } elseif ($role == 'ict_group_leader' && auth()->user()->role != 'ict_group_leader') {
            abort(403);
        } elseif ($role == 'ict_technician' && auth()->user()->role != 'ict_technician') {
            abort(403);
        } elseif ($role == 'ict_admin' && auth()->user()->role != 'ict_admin') {
            abort(403);
        } else {
            return $next($request);
        }
        // if ($role == 'guest' && auth()->user()->role != 'guest' ) {
        //     abort(403);
        // }
    }
}
