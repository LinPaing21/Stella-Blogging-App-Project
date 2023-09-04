<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter ($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where( fn($query) =>
                $query
                    ->where('title', 'like', '%'. $filters['search'] .'%')
                    ->orWhere('body', 'like', '%'. $filters['search'] .'%')
            );

        }

        if ($filters['category'] ?? false) {
            $query->whereHas('category', fn($query) =>
                $query
                    ->where('slug', $filters['category'])
            );
        }

        if ($filters['author'] ?? false) {
            $query->whereHas('user', fn($query) =>
                $query
                    ->where('username', $filters['author'])
            );
        }

        return $query;

    }

    /**
     * Get the user that owns the Article
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get all of the comments for the Article
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
