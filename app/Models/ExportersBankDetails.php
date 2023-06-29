<?php

namespace App\Models;

use Exporter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExportersBankDetails extends Model
{
    use HasFactory;

    protected $table = 'tbl_exporter_bank_details';

    protected $fillable = [
        'exporter_id', 'name', 'account_no', 'ifsc', 'cheque_img', 'status', 'created_by', 'updated_by', 'created_at',
    ];

    public function get_exporter()
    {
        return $this->belongsTo(Exporter::class, 'id', 'exporter_id');
    }

}
