<?php

namespace App\Http\Controllers\Api;

use App\Enums\StatusCodeEnum;
use App\Enums\UserRequestStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserRequestResource;
use App\Http\Traits\CommonTrait;
use App\Models\UserRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestApiController extends Controller
{
    use CommonTrait;
    public function makeRequest(Request $request): JsonResponse
    {
        $request->validate([
            "points" => ["required", "integer", "min:30", "max:".Auth::user()->point]
        ]);

        $userrequest = UserRequest::create([
            'user_id'   => Auth::id(),
            'status'    => UserRequestStatusEnum::Pending,
            'points'    => $request->points,
        ]);

        return $this->sendResponse('Your request make successfully.', StatusCodeEnum::Success, new UserRequestResource($userrequest));
    }

    public function list(): JsonResponse
    {
        $userrequests = Auth::user()->userrequests()->latest()->paginate();
        return $this->sendResponse('Your Requests list load successfully.', StatusCodeEnum::Success, UserRequestResource::collection(($userrequests)), true);
    }
}
