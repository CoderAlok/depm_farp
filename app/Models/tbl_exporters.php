<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Notification\Notifiable;

class tbl_exporters extends Model
{
    // use HasApiTokens, HasFactory, Notifiable;
    use HasFactory;

    protected $guard = 'exporter';

    protected $fillable = ['role_id', 'name', 'email', 'username', 'password', 'phone', 'gender', 'address'];

}
