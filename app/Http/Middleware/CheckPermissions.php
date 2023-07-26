<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class CheckPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $authenticatedUser = auth()->user();
        $permissionsInCache = Cache::get('permissions_'. $authenticatedUser->id)->toArray();

        $routeName = $request->route()->getName();

        if (!$permissionsInCache || !in_array($routeName, $permissionsInCache)) {
            return response()->json(['error' => 'Permission denied.'], 403);
        }

        return $next($request);
    }
}
