<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CacheControl
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // শুধুমাত্র GET রিকোয়েস্টের জন্য হেডার যুক্ত করা হবে
        if ($request->isMethod('get')) {
            $response->headers->set('Cache-Control', 'max-age=31536000, public');
        }

        return $response;
    }
}
