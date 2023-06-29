<?php

namespace App\Models;

use Category;
use ExportersAddress;
use ExportersBankDetails;
use ExportersOtherCodes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class tbl_exporters extends Authenticatable
{
    // use HasApiTokens, HasFactory, Notifiable;
    use HasFactory;

    protected $guard = 'exporter';

    protected $fillable = [
        'role_id', 'type', 'name', 'cheif_ex_name', 'email', 'username', 'password', 'phone',
        'gender', 'address_id', 'bank_id', 'other_code_id', 'regsitration_status', 'created_by', 'created_at',
    ];

    public function get_category_details()
    {
        return $this->hasOne(Category::class, 'category_id', 'id');
    }

    public function get_address_details()
    {
        return $this->hasOne(ExportersAddress::class, 'exporter_id', 'id');
    }

    public function get_bank_details()
    {
        return $this->hasOne(ExportersBankDetails::class, 'exporter_id', 'id');
    }

    public function get_other_code_details()
    {
        return $this->hasOne(ExportersOtherCodes::class, 'exporter_id', 'id');
    }

}
