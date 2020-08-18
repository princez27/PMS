<?php

namespace App\Http\Middleware;

use App\Job;
use Closure;
use Illuminate\Support\Facades\Auth;

class EditTaskMiddleware
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
        $user_id = Auth::id();
        $valid = Job::where('user_id','=', $user_id)->where('id', '=',$request->tid)->where('project_id', '=',$request->pid)->get();
        if(!$valid->isEmpty()){
            return $next($request);
        }
        else{
            return redirect()->back();
        }
    }
}
