<?php

namespace App\Http\Middleware;

use App\Constants\Code;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class VerifyAdmin
{
    /**
     * Handle an incoming request
     */
    public function handle(Request $request, Closure $next)
    {
        $user_id = auth()->id();

        if($user_id == null){
            return response()->json([
                'code' => Code::ERROR,
                'message' => 'you no login']);
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
            return response()->json([
                'code' => Code::ERROR,
                'message' => 'only admin access to resource']);
        }
    }
}
