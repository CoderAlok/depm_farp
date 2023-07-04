<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schemes extends Model
{
    use HasFactory;

    protected $table = 'tbl_scheme_master';

    protected $fillable = [
        'code', 'long_name', 'short_name', 'logo', 'amount', 'status', 'created_by', 'created_at',
    ];

}
