<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\User;

class User extends Authenticatable
{

        protected $table = 'users';
        protected $fillable = [
            'name',
            'email',
            'password',
            'codigo_verificacion',
        ];
        use HasApiTokens, HasFactory, Notifiable;


}
