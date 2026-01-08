<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Story extends Model
{
    public $timestamps = false;
    protected $table = 'ssbymoutadb.story';
    protected $primaryKey = 'id';
    protected $fillable = [
        'author_id',
        'title',
        'subtitle',
        'content',
        'rating',
        'timestamp'
    ];

    public function author(): BelongsTo{
        return $this->belongsTo(User::class, 'author_id', 'id');
    }
}
