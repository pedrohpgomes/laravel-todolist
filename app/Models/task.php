<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class task extends Model
{
    use HasFactory;
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    public $incrementing = true;

    use SoftDeletes;
}//class
