<?php

namespace App\Http\Middleware;

use Auth;
use Route;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Closure;

class Permission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $page)
    {

        if (Auth::user()->hasRole('Admin')) {
            return $next($request);
        }
        $pagePermission = Auth::user()->getPermissionsViaRoles()->where('page', $page);
        $action = explode('@', Route::getCurrentRoute()->getActionName());
        $actions = [];
        foreach($pagePermission as $val){
            switch($val->action){
                case 'List':
                        array_push($actions,'index');
                    break;
                case 'Create':
                        array_push($actions,'create','store');
                    break;
                case 'Update':
                        array_push($actions,'update','edit');
                    break;
                case 'Delete':
                        array_push($actions,'destroy');
                    break;
            }
        }
        if(in_array($action[1],$actions)){
            return $next($request);
        }
        throw UnauthorizedException::forPermissions([$action[1]]);
    }
}
