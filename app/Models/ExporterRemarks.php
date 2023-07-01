<?php

namespace App\Models;

use Exporter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExporterRemarks extends Model
{
    use HasFactory;

    protected $table = 'tbl_exporter_remarks';

    protected $fillable = [
        'exporter_id',
        'type',
        'remarks',
        'status',
        'created_by',
        'updated_by',
        'created_at',
    ];

    public function get_exporter_details()
    {
        return $this->belongsTo(Exporter::class, 'id', 'exporter_id');
    }
}
