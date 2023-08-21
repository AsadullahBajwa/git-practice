<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    protected $connection="mongodb";
    protected $collection="players_collection";
    protected $hidden=['updated_at','created_at'];
}
