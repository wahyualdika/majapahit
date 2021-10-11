<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileModel extends Model
{
    use HasFactory;

    protected $table = 'profile_user';

    public function user()
    {
        return $this->hasOne(Users::class,'users_id');
    }
}
