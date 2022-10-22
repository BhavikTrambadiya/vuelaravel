<?php

namespace App\Services;

use App\Enums\TransactionTypeEnum;
use App\Models\Admin;
use App\Models\Post;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserRequest;

class TransactionServices
{
    public function debited(User $user, int $points, TransactionTypeEnum $type, Post $post = null): Transaction
    {
        $transaction = Transaction::create([
            'user_id'       => $user->id,
            'relative_id'   => $post->id,
            'points'        => $points,
            'activity'      => true,
            'type'          => $type->value,
        ]);

        return $transaction;
    }

    public function credited(User $user, int $points, TransactionTypeEnum $type, UserRequest $userrequest, Admin $admin): Transaction
    {
        $transaction = Transaction::create([
            'user_id'       => $user->id,
            'admin_id'      => $admin->id,
            'relative_id'   => $userrequest->id,
            'points'        => $points,
            'activity'      => false,
            'type'          => $type->value,
        ]);

        return $transaction;
    }
}
