<?php

namespace App\Models;

use Exporter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExportersOtherCodes extends Model
{
    use HasFactory;

    protected $table = 'tbl_exporter_other_code';

    protected $fillable = [
        'exporter_id', 'iec', 'rcmc', 'epc', 'urn', 'hsm', 'status', 'created_by', 'updated_by', 'created_at',
    ];

    public function get_exporter()
    {
        return $this->belongsTo(Exporter::class, 'id', 'exporter_id');
    }
}
