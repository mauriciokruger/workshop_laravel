<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Log;
class CheckLog
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $data['type'] = $request->getMethod();
        $data['route'] = $request->getRequestUri();
        $data['user_id'] = Auth::user()->id;

        Log::create($data);
        
        return $next($request);
    }
}
