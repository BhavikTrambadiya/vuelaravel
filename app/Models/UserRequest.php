<?php

namespace App\Models;

use App\Enums\UserRequestStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRequest extends Model
{
    use HasFactory;
    protected $dates = ['approvedate'];

    protected $fillable = [
        'user_id',
        'admin_id',
        'status',
        'points',
        'approvedate'
    ];

    protected $casts = [
        'status' => UserRequestStatusEnum::class
    ];

    public function scopeIsPending($query)
    {
        return $query->where('status', UserRequestStatusEnum::Pending);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
