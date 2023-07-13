<?php

namespace App\Models;

use Applications;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_application_event_details extends Model
{
    use HasFactory;

    protected $table = 'tbl_application_event_details';

    protected $fillable = [
        'appl_id', 'details', 'event_type', 'other_event_type', 'participation_type', 'city', 'country_id', 'status', 'created_by', 'updated_by',
    ];
    public function get_application_details()
    {
        return $this->hasOne(Applications::class, 'id', 'appl_id');
    }
}
