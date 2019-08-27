<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogins
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
        if (!session_id()) session_start(); 
//        echo $_SESSION['userinfo'];
        if(empty($_SESSION['userinfo'])){
//            echo"<script>alert('请登录后再进行操作!!!');location.href='/admin/login'</script>";
//            exit;
            echo view('admin.login');exit;
        }
        return $next($request);
    }
}
