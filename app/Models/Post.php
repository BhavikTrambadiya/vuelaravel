<?php

namespace App\Models;

use App\Http\Traits\CommonTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use CommonTrait;
    protected $fillable = [
        'user_id',
        'title',
        'image',
    ];

    protected function image(): Attribute
    {
        return new Attribute(
            get:fn ($value) => asset('images/posts/'.$value)
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
