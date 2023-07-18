<?php

namespace App\Models;

use Applications;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use User;

class ApplicationProgressMaster extends Model
{
    use HasFactory;

    protected $fillable = ['appl_id', 'remarks', 'created_by', 'created_at'];

    public function get_application_details()
    {
        return $this->hasOne(Applications::class, 'id', 'appl_id');
    }

    public function get_user_details()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

}
