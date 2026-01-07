<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    public $timestamps = false;
    protected $table = 'ssbymoutadb.users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'username',
        'name',
        'email',
        'password'
    ];

    public function author(): HasOne{
        return $this->hasOne(Author::class, 'author_id', 'id');
    }
}
