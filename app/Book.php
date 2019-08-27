<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Laravel\Scout\Searchable;

/**
 * Class Book
 * @package App
 */
class Book extends Model
{
    use Searchable;

    /**
     * @var string
     */
    protected $table = 'book_base';

    /**
     * @var string
     */
    protected $primaryKey = 'books_id';

    /**
     * @var bool
     */
    public $timestamps = false;


    public function toSearchableArray()
    {
        $array = $this->toArray();

        $array = ['title', 'author', 'annotation'];

        return $array;
    }

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
