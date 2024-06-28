<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany; 
use App\Models\User;

class Meeting extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'meetings';

    protected $guarded = ['id'];

   
    public function users()
    {
        return $this->belongsToMany(User::class, 'meeting_users', 'meeting_id', 'user_id')->withTimestamps();
    }

}
