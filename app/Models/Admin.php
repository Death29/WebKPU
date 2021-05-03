<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;

class Admin extends AuthenticatableUser
{
    use HasFactory;

    protected $table = "admin";
    protected $fillable = [
        "id",
        "username",
        "password",
    ];
}
