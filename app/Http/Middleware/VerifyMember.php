<?php

namespace App\Http\Middleware;

use App\Constants\Code;
use Closure;
use Illuminate\Http\Request;

class VerifyMember
{
    /**
     * Handle an incoming request
     */
    public function handle(Request $request, Closure $next)
    {
        $user_id = auth()->id();
        $user = $request->route('user');

        if($user == $user_id){
            return $next($request);
        } else {
            return \App\Helper::errorResponse("You can not access to resource");
        }

    }
}
