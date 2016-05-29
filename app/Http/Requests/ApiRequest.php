<?php

namespace App\Http\Requests;

use Illuminate\Http\JsonResponse;

abstract class ApiRequest extends Request
{
    public function response(array $errors)
    {
        return new JsonResponse($errors, 422);
    }
}
