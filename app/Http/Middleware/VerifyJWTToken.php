<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class VerifyJWTToken
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
        // JWTAuth::parseToken()->authenticate();
        
        // return $next($request);

        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return response()->json(['status' => 'Token is Invalid'], 401);
            } elseif ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return response()->json(['status' => 'Token is Expired'], 401);
            } elseif ($e instanceof \Tymon\JWTAuth\Exceptions\TokenBlacklistedException){
                return response()->json(['status' => 'Token is Blacklisted'], 401);
            } else {
                return response()->json(['status' => 'Authorization Token not found'], 401);
            }
        }
             return $next($request);
    }
}
