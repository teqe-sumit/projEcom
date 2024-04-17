<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class FUser extends Model

{ 
    use HasFactory;
    protected $table = 'Fusers';
    protected $fillable = ['name', 'email', 'phone', 'password'];

}
