<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CekLevel
{
    /**
     * Pemakaian di route: ->middleware('level:1,4')  (boleh level 1 atau 4)
     */
    public function handle(Request $request, Closure $next, string ...$levels): Response
    {
        $levelUser = (string) $request->user()?->level;

        if (! in_array($levelUser, $levels, true)) {
            abort(403, 'Anda tidak memiliki hak akses ke halaman ini.');
        }

        return $next($request);
    }
}