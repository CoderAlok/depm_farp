<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Applications;

class tbl_application_travel_details extends Model
{
    use HasFactory;

    protected $table = 'tbl_application_travel_details';

    protected $fillable = [
        'appl_id', 'destination_type', 'traveller_name', 'designation', 'mode_of_travel', 'class_of_travel', 'total_expense', 'incentive_claimed', 'file_visa', 'file_ticket', 'file_boarding_pass', 'status', 'created_by', 'updated_by',
    ];

    public function get_application_details(){
        return $this->hasOne(Applications::class, 'id', 'appl_id');
    }
}
