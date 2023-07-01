<?php

namespace App\Models;

use Exporter;
use District;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExportersAddress extends Model
{
    use HasFactory;

    protected $table = 'tbl_exporter_address';

    protected $fillable = [
        'exporter_id', 'address', 'post', 'city', 'district', 'pincode', 'status', 'created_by', 'updated_by', 'created_at',
    ];

    public function get_exporter()
    {
        return $this->belongsTo(Exporter::class, 'id', 'exporter_id');
    }

    public function get_district(){
        return $thi->belongsTo(District::class, 'id', 'district');
    }

}
