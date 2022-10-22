<?php

namespace App\Enums;

enum UserRequestStatusEnum: string {
    case Pending = "Pending";
    case Approve = "Approve";
}