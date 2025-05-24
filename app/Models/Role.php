<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function hasUser($user)
    {
        return $this->users()->where('user_id', $user->id)->exists();
    }
}
