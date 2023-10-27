<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Posts extends Model
{
    use HasFactory;

    protected $casts = [
        'tags' => 'array',
    ];

    protected $fillable = [
        "title",
        "content",
        "url",
        "order",
        "status",
        "image",
        "tags"
    ];

    public function getShortContentAttribute()
    {
        return Str::words($this->content, 60, '...');
    }
}
