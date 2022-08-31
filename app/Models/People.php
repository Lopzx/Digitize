<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $fillable = [
        'addName', 'addEmail', 'addDob', 'addCategory', 'addImage','vote'
    ];
    use HasFactory;
}
