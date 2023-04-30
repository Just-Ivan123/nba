<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckComment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ( preg_match('/hate|idiot|stupid/i', $request->content, $matches) != 0) {
            return redirect('/forbidden-comment')->withErrors('Words like: ' . implode(', ', $matches) . " - are forbidden");
          }else{
        return $next($request);
          }
    }
}
