<?php
namespace App\Interfaces;

interface CustomInterface
{
    public function generateExpApp($exist_app_no = '');

    public function encrypt($str);

    public function decrypt($str);

    public function generateOfficerUserName($role_id);
}
