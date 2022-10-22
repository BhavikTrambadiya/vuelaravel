<?php

namespace App\Enums;

enum TransactionTypeEnum: string {
    case CreatedPost = "On Created Post";
    case RequestApproved = "On Request Approved";
}