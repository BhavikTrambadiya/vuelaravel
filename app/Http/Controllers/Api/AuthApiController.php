<?php

namespace App\Http\Controllers\Api;

use App\Enums\StatusCodeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthLoginRequest;
use App\Http\Requests\Api\AuthRegisterRequest;
use App\Http\Resources\UserResource;
use App\Http\Traits\CommonTrait;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthApiController extends Controller
{
    use CommonTrait;
    public function register(AuthRegisterRequest $request): JsonResponse
    {
        $user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
         ]);

        Auth::login($user, true);
        $data = (new UserResource($user))->access_token($user->createToken('API Token')->accessToken);
        return $this->sendResponse('User register successfully.', StatusCodeEnum::Success, $data);
    }

    public function login(AuthLoginRequest $request): JsonResponse
    {
        $user = User::where('email', $request->email)->first();
        if (isset($user)) {
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user, true);
                $data = (new UserResource($user))->access_token($user->createToken('API Token')->accessToken);
                return $this->sendResponse('User register successfully.', StatusCodeEnum::Success, $data);
            } else {
                return $this->sendResponse('The password does not match.', StatusCodeEnum::Validation);
            }
        }
    }

    public function userDetails(): JsonResponse
    {
        $user = Auth::user();
        if (isset($user)) {
            return $this->sendResponse('User register successfully.', StatusCodeEnum::Success, new UserResource($user));
        } else {
            return $this->sendResponse('The password does not match.', StatusCodeEnum::Validation);
        }
    }
}
