<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Override;

class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;

    protected $fillable = ['body'];

    // #[Override]
    // protected static function booted()
    // {
    //     static::updated(function(Comment $comment) {
    //         // Refresh
    //         Cache::forget('comments');
    //         Cache::put('comments' ,$comment->fresh() , 60);
    //     });
    // }


}
