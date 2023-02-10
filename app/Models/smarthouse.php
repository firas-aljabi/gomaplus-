<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class smarthouse extends Model
{
    use HasFactory;
    protected $fillable = ['email', 'cameras',  'alexa', 'optical_extension','Wire_extension',
    'smart_TV','smart_light','living_room','living_room_2','bedroom_1','bedroom_2',
    'bedroom_3','kitchen','detais'];

}
