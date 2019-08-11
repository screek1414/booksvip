<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * Class Book
 * @package App
 */
class Book extends Model
{
    /**
     * @var string
     */
    protected $table = 'book_base';

    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function like()
    {
        return $this->hasMany(Like::class, 'book_id', 'books_id');
    }

    /**
     * @param $likes
     * @return bool
     */
    public function checkLiked($likes)
    {
        $flag = false;
        if (!$likes->isEmpty()) {
            foreach ($likes as $like) {
                if ($like->user_id == Auth::id()) {
                    $flag = true;
                    break;
                }
            }
        }
        return $flag;
    }
}
