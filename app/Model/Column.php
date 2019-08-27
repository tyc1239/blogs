<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
    //
    public $table = 'column';
    protected $autoWriteTimestamp = true;
    public $timestamps = true; 
}
