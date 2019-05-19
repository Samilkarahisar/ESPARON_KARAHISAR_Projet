<?php

namespace App\Http\Middleware;

use App\Modeles\User;
use App\Modeles\UserDAO;
use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        $userDAO = new UserDAO();
        $user = $userDAO->createObject(Auth::user());
        if(!$user->getIsAdmin()){
            return redirect('/');
        }

        return $next($request);
    }
}
