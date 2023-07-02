<?php
namespace App\Repositories;

use App\Interfaces\CustomInterface;
use App\Models\tbl_exporters;
use Illuminate\Support\Facades\Crypt;

class CustomRepository implements CustomInterface
{
    public function __construct()
    {
        define('APP_CODE', 'EXPREG');
    }

    public function generateExpApp($exist_app_no = '')
    {
        $applicaton_no = '';
        $appInfo       = array('applicaton_no' => '', 'app_count_no' => '');
        if (!empty($exist_app_no)) {
            $appnew   = tbl_exporters::where('app_no', $exist_app_no)->first();
            $newCount = (int) $appnew->app_count_no;
            if ($newCount < 999) {
                $newCount = $this->getNumApp($newCount + 1);
            } else {
                $newCount = $newCount + 1;
            }
            $applicaton_no = APP_CODE . $this->getCurrFinancialYr() . $this->getMonth() . $newCount;
            $appnew        = tbl_exporters::where('app_no', $applicaton_no);
            if (!$appnew->exists()) {
                $appInfo['applicaton_no'] = $applicaton_no;
                $appInfo['app_count_no']  = $newCount;
                return $appInfo;
            } else {
                $this->generateExpApp($applicaton_no);
            }
        } else {
            $app = tbl_exporters::orderBy('id', 'desc')->first();
            if (!empty($app->app_no)) {
                $newCount = (int) $app->app_count_no;
                if ($newCount < 999) {
                    $newCount = $this->getNumApp($newCount + 1);
                } else {
                    $newCount = $newCount + 1;
                }
                $applicaton_no = APP_CODE . $this->getCurrFinancialYr() . $this->getMonth() . $newCount;
                $check         = tbl_exporters::where('app_no', $applicaton_no);
                if ($check->exists()) {
                    $this->generateExpApp($applicaton_no);
                } else {
                    $appInfo['applicaton_no'] = $applicaton_no;
                    $appInfo['app_count_no']  = $newCount;
                    return $appInfo;
                }
            } else {
                $applicaton_no            = APP_CODE . $this->getCurrFinancialYr() . $this->getMonth() . '0001';
                $appInfo['applicaton_no'] = $applicaton_no;
                $appInfo['app_count_no']  = '0001';
                return $appInfo;
            }
        }
    }

    public function getCurrFinancialYr()
    {
        if (date('m') <= 6) {
            $financial_year = (date('y') - 1) . date('y');
        } else {
            $financial_year = date('y') . (date('y') + 1);
        }
        return $financial_year;
    }

    public function getMonth()
    {
        if ((int) date('m') < 10) {
            $month = '0' . ((int) date('m'));
        } else {
            $month = date('m');
        }
        return $month;
    }

    public function getNumApp(int $num)
    {
        $num    = (string) $num;
        $strlen = strlen($num);
        $newnum = '';
        for ($i = 0; $i < (4 - $strlen); $i++) {
            $newnum .= '0';
        }
        $newnum .= (int) $num;
        return $newnum;
    }

    public function encrypt($str)
    {
        return Crypt::encryptString($str);
    }

    public function decrypt($str)
    {
        return Crypt::decryptString($str);
    }

    public function generateOfficerUserName($role_id)
    {
        $username = '';
        $random   = rand(11111111, 99999999);
        switch ($role_id) {
            // case 1:
            //     $username = '';
            //     break;

            case 2:
                $username = 'PODEPM';
                break;

            case 3:
                $username = 'DIRDEPM';
                break;

            case 4:
                $username = 'SOMSME';
                break;

            case 5:
                $username = 'PSDEPM';
                break;

            case 7:
                $username = 'AODEPM';
                break;

            case 10:
                $username = 'SECMSME';
                break;

            default:
                $username = '';
                break;
        }

        return strtolower($username . $random);
    }
}
