<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Team;

class isTeam
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $teamId = $request->route('team');

        if (!$teamId) {
            return redirect()->route('home');
        }

        if (Auth::user()->id !== $teamId->creator_id) {
            // Redirect if the user is not the creator of the team
            return redirect()->route('home');
        }

        return $next($request);
    }
}

