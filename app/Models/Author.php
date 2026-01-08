<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Author extends Model
{
    public $timestamps = false;
    protected $table = 'ssbymoutadb.author';
    protected $primaryKey = 'author_id';
    protected $fillable = [
        'author_id',
        'author_name',
        'author_username',
        'email',
        'story_count'
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function story(): HasMany{
        return $this->hasMany(Story::class, 'author_id');
    }

}
