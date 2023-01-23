<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coba extends Model
{
    use HasFactory;
    protected $table = ['name', 'email', 'password'];
}
