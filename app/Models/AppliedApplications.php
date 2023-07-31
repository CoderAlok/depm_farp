<?php

namespace App\Models;

use Applications;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppliedApplications extends Model
{
    use HasFactory;
    protected $table = 'tbl_applied_applications';

    protected $fillable = ['appl_id', 'description', 'order_file_name', 'appealed_amount', 'confirmed', 'created_by', 'updated_by', 'created_at'];

    public function get_application_details()
    {
        return $this->hasOne(Applications::class, 'id', 'appl_id');
    }
}
