<?php

namespace App\Http\Middleware;

use App\Enums\StatusCodeEnum;
use App\Http\Traits\CommonTrait;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccessTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    use CommonTrait;
    public function handle(Request $request, Closure $next)
    {
        if ($request->header('authorization') == null) {
            return $this->sendResponse('Please enter access token.', StatusCodeEnum::Success);
        }
        if (!Auth::guard('api')->check()) {
            return $this->sendResponse('User not found.', StatusCodeEnum::Notfound);
        }
        return $next($request);
    }
}
