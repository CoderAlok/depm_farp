<?php

namespace App\Models;

use Applications;
use ApplicationEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_application_stall_details extends Model
{
    use HasFactory;

    protected $table = 'tbl_application_stall_details';

    protected $fillable = [
        'appl_id', 'event_id', 'total_cost', 'claimed_cost', 'stall_allot_letter', 'stall_reg_pay_recipt', 'created_by', 'updated_by',
    ];

    public function get_application_details()
    {
        return $this->hasOne(Applications::class, 'id', 'appl_id');
    }
    
    public function get_event_details(){
        return $this->hasOne(ApplicationEvents::class, 'id', 'event_id');
    }
}
