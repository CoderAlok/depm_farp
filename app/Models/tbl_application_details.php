<?php

namespace App\Models;

use Exporter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Schemes;

class tbl_application_details extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tbl_application_details';

    protected $fillable = [
        'scheme_id', 'exporter_id', 'meeting_details', 'participation_details', 'certi_type', 'certi_name', 'certi_iss_auth', 'certi_cost', 'certi_payment_reciept_file', 'confirmed', 'status', 'created_by', 'updated_by',
    ];

    public function get_exporter_details()
    {
        return $this->hasOne(Exporter::class, 'id', 'exporter_id');
    }

    public function get_scheme_details()
    {
        return $this->hasOne(Schemes::class, 'id', 'scheme_id');
    }
}
