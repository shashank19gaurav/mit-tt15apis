<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'tblcategories';
    protected $fillable = array('cat_name', 'description', 'cat_type', 'cat_id');
}
