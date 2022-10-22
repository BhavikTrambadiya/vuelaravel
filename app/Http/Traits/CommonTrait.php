<?php

namespace App\Http\Traits;

use App\Enums\StatusCodeEnum;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

trait CommonTrait
{
    public function sendResponse(string $message, StatusCodeEnum $code, JsonResource  $data = null, bool $pagination = false)
    {
        $response = [
            'message' => $message
        ];
        if (isset($data)) {
            if ($pagination) {
                $response = $response+$data->response()->getData(true);
            } else {
                $response['data'] = $data;
            }
        }
        return response()->json($response, $code->value);
    }

    public function uploadFile($image, $path)
    {
        $image_name = uniqid(Str::random(12)) . '.' . $image->getClientOriginalExtension();
        $image->move($path, $image_name);
        return $image_name;
    }
}
