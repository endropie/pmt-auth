<?php

namespace App\Models;

use Endropie\LumenMicroServe\Auth\Concerns\AuthorizableToken;
use Endropie\LumenMicroServe\Traits\HasFilterable;
use Endropie\LumenMicroServe\Traits\UniqueIdentifiable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory, AuthorizableToken, HasFilterable, UniqueIdentifiable;

    protected $fillable = [
        'name', 'email', 'phone',
    ];

    protected $hidden = [
        'password',
    ];
    
}
