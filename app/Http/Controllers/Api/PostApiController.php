<?php

namespace App\Http\Controllers\Api;

use App\Enums\StatusCodeEnum;
use App\Enums\TransactionTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PostRequest;
use App\Http\Resources\PostResource;
use App\Http\Traits\CommonTrait;
use App\Models\Post;
use App\Models\User;
use App\Services\TransactionServices;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class PostApiController extends Controller
{
    use CommonTrait;
    public function create(PostRequest $request): JsonResponse
    {
        $post = Post::create([
            'title'     => $request->title,
            'image'     => $this->uploadFile($request->image, 'images/posts'),
            'user_id'   => Auth::id()
        ]);

        $user = User::find(Auth::id());
        $user->increment('point', 10);

        (new TransactionServices())->debited($user, 10, TransactionTypeEnum::CreatedPost, $post);

        return $this->sendResponse('Post created successfully.', StatusCodeEnum::Success, new PostResource($post));
    }

    public function list(): JsonResponse
    {
        $posts = Auth::user()->posts()->latest()->paginate();
        return $this->sendResponse('Posts list load successfully.', StatusCodeEnum::Success, PostResource::collection(($posts)), true);
    }
}
