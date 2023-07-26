<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblApplicationLog extends Model
{
    use HasFactory;

    protected $table    = 'tbl_application_log';
    protected $fillable = ['appl_id', 'from_user_type', 'from_user', 'to_user_type', 'to_user', 'status', 'remarks', 'updated_date', 'created_at', 'updated_at'];
}
