<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $table = 'tblevents';
    protected $fillable = array('event_id', 'event_name', 'cat_id', 'event_max_team_number', 'description');
}
