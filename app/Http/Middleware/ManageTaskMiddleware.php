<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ManageTaskMiddleware
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
        $user = Auth::user();
        $valid_id = $user->projects()->wherePivot('user_id','=',$user->id)->wherePivot('project_id','=',$request->id)->get();
        
        if(!$valid_id->isEmpty())
        {
            return $next($request);
        }
        else
        {
            return redirect()->back();
        }
       
    }
}
