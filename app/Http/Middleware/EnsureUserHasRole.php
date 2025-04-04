<?php

namespace App\Http\Middleware;

use App\Services\AuthService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasRole
{

    public function __construct(private AuthService $authService) {}

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if ( ! auth()->check()) {
            return redirect("login");
        }

        if (! $this->authService->isAuthorised($request->user()->role, $role)) {
            return redirect()->route('dashboard')->with([
                'message' => 'You are not authorized to access that page.',
                'type' => 'error'
            ]);
        }
        return $next($request);
    }
}
