<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersInfo extends Model
{
    use HasFactory;
    protected $fillable = ['firstname', 'lastname',  'email', 'location','phonenumber'];

}
