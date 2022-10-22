<?php

namespace App\Enums;

enum StatusCodeEnum: int {
    case Success = 200;
    case Validation = 422;
    case Notfound = 401;
}