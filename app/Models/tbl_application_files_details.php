<?php

namespace App\Models;

use Applications;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_application_files_details extends Model
{
    use HasFactory;

    protected $table = 'tbl_application_files_details';

    protected $fillable = [
        'appl_id', 'iec_file', 'cancelled_cheque_file', 'file_visa', 'file_ticket', 'file_boarding_pass', 'stall_allot_letter', 'stall_reg_pay_recipt', 'certi_payment_reciept_file', 'tour_dairy', 'status', 'created_by', 'updated_by',
    ];

    public function get_application_details()
    {
        return $this->hasOne(Applications::class, 'id', 'appl_id');
    }
}
