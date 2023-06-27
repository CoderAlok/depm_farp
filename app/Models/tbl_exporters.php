<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class tbl_exporters extends Authenticatable
{
    // use HasApiTokens, HasFactory, Notifiable;
    use HasFactory;

    protected $guard = 'exporter';

    protected $fillable = ['role_id', 'name', 'email', 'username', 'password', 'phone', 'gender', 'address'];

}
