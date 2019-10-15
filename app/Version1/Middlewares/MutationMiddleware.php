<?php


class MutationMiddleware
{

    public function handle($request, \Closure $next)
    {
        // setter('table', request()->year."_".request()->month);
        // \Session::flash('table', request()->year."_".request()->month);
        
        return $next($request);
    }
}
