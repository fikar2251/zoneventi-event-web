<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $table = 'users_detail';

    protected $guarded = ['id'];

    protected $fillable = [
        'user_id',
        'full_name',
        'username',
        'phone',
        'email',
        'country',
        'city',
        'postal_code',
        'date_visit',
        'time_visit',
        'contact_person_name',
        'contact_person_phone',
        'notes',
        'documents_type',
        'documents_number',
        'documents_expire_date',
        'documents_file'
    ];
}
