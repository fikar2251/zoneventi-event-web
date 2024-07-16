<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MobUsers extends Model
{
    use HasFactory;

    protected $table = 'mob_users';

    protected $guarded = ['id'];

   

}
