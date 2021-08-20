<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class VerifyAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user_id = auth()->id();

        if($user_id == null){
            return response()->json(['message' => 'you no login'], 412);
        }

        $roles = User::find($user_id)->roles;

        $cnt = 0;
        foreach ($roles as $role){
            if($role->name == 'admin'){
                $cnt++;
            }
        }

        if($cnt == 1){
            return $next($request);
        } else {
            return response()->json(['message' => 'only admin access to resource'], 412);
        }
    }
}
