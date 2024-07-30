<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MobUsers extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'mob_users';

    protected $guarded = ['id'];

   
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
