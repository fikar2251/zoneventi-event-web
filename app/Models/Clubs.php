<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clubs extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'clubs';

    protected $guarded = ['id'];

    public function events(): HasMany
    {
        return $this->hasMany(Events::class, 'club_id');
    }
}
