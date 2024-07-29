<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Events extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'events';

    protected $fillable = [
        'name',
        'club_id',
        'description',
        'contact_number' ,
        'whatsapp_number' ,
        'event_time_start',
        'event_time_end'  ,
        'event_date',
        'location' , 
        'longitude' ,
        'latitude' ,
        'banner' ,
        'tags' 
    ];

    public function getDetailClubs(): BelongsTo  {
        return $this->belongsTo(Clubs::class, 'club_id');
    }
}
