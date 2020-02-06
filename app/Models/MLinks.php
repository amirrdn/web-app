<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MLinks extends Model
{
    protected $table    = 'links';
    protected $fillable = ['id', 'link_name', 'link'];
}
