<?php

namespace App\Models;

use Applications;
use Exporter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use User;

class TblComplaince extends Model
{
    use HasFactory;
    protected $table = 'tbl_complaince';

    protected $fillable = ['appl_id', 'exporter_id', 'user_id', 'section_type', 'description', 'file_name', 'created_by', 'updated_by', 'created_at'];

    public function get_user_details()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function get_application_details()
    {
        return $this->hasOne(Applications::class, 'id', 'appl_id');
    }

    public function get_exporter_details()
    {
        return $this->hasOne(Exporter::class, 'id', 'exporter_id');
    }
}
