<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $table = 'subscribers';

    protected $fillable = [
        'idnum', 'firstname', 'middlename', 'lastname', 'dlsu_email', 'non_dlsu_email', 'nickname', 'college'
    ];
}
