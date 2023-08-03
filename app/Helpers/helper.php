<?php

function getExporterName($id = null)
{
    return \App\Models\tbl_exporters::where('id', $id)->first()->name;
}

function getCountry()
{
    return [
        "Select a country",
        "Afghanistan", //"AF" => "Afghanistan",
        "Albania", //"AL" => "Albania",
        "Algeria", //"DZ" => "Algeria",
        "American Samoa", //"AS" => "American Samoa",
        "Andorra", //"AD" => "Andorra",
        "Angola", //"AO" => "Angola",
        "Anguilla", //"AI" => "Anguilla",
        "Antarctica", //"AQ" => "Antarctica",
        "Antigua and Barbuda", //"AG" => "Antigua and Barbuda",
        "Argentina", //"AR" => "Argentina",
        "Armenia", //"AM" => "Armenia",
        "Aruba", //"AW" => "Aruba",
        "Australia", //"AU" => "Australia",
        "Austria", //"AT" => "Austria",
        "Azerbaijan", //"AZ" => "Azerbaijan",
        "Bahamas", //"BS" => "Bahamas",
        "Bahrain", //"BH" => "Bahrain",
        "Bangladesh", //"BD" => "Bangladesh",
        "Barbados", //"BB" => "Barbados",
        "Belarus", //"BY" => "Belarus",
        "Belgium", //"BE" => "Belgium",
        "Belize", //"BZ" => "Belize",
        "Benin", //"BJ" => "Benin",
        "Bermuda", //"BM" => "Bermuda",
        "Bhutan", //"BT" => "Bhutan",
        "Bolivia", //"BO" => "Bolivia",
        "Bosnia and Herzegovina", //"BA" => "Bosnia and Herzegovina",
        "Botswana", //"BW" => "Botswana",
        "Bouvet Island", //"BV" => "Bouvet Island",
        "Brazil", //"BR" => "Brazil",
        "British Antarctic Territory", //"BQ" => "British Antarctic Territory",
        "British Indian Ocean Territory", //"IO" => "British Indian Ocean Territory",
        "British Virgin Islands", //"VG" => "British Virgin Islands",
        "Brunei", //"BN" => "Brunei",
        "Bulgaria", //"BG" => "Bulgaria",
        "Burkina Faso", //"BF" => "Burkina Faso",
        "Burundi", //"BI" => "Burundi",
        "Cambodia", //"KH" => "Cambodia",
        "Cameroon", //"CM" => "Cameroon",
        "Canada", //"CA" => "Canada",
        "Canton and Enderbury Islands", //"CT" => "Canton and Enderbury Islands",
        "Cape Verde", //"CV" => "Cape Verde",
        "Cayman Islands", //"KY" => "Cayman Islands",
        "Central African Republic", //"CF" => "Central African Republic",
        "Chad", //"TD" => "Chad",
        "Chile", //"CL" => "Chile",
        "China", //"CN" => "China",
        "Christmas Island", //"CX" => "Christmas Island",
        "Cocos [Keeling] Islands", //"CC" => "Cocos [Keeling] Islands",
        "Colombia", //"CO" => "Colombia",
        "Comoros", //"KM" => "Comoros",
        "Congo - Brazzaville", //"CG" => "Congo - Brazzaville",
        "Congo - Kinshasa", //"CD" => "Congo - Kinshasa",
        "Cook Islands", //"CK" => "Cook Islands",
        "Costa Rica", //"CR" => "Costa Rica",
        "Croatia", //"HR" => "Croatia",
        "Cuba", //"CU" => "Cuba",
        "Cyprus", //"CY" => "Cyprus",
        "Czech Republic", //"CZ" => "Czech Republic",
        "Côte d’Ivoire", //"CI" => "Côte d’Ivoire",
        "Denmark", //"DK" => "Denmark",
        "Djibouti", //"DJ" => "Djibouti",
        "Dominica", //"DM" => "Dominica",
        "Dominican Republic", //"DO" => "Dominican Republic",
        "Dronning Maud Land", //"NQ" => "Dronning Maud Land",
        "East Germany", //"DD" => "East Germany",
        "Ecuador", //"EC" => "Ecuador",
        "Egypt", //"EG" => "Egypt",
        "El Salvador", //"SV" => "El Salvador",
        "Equatorial Guinea", //"GQ" => "Equatorial Guinea",
        "Eritrea", //"ER" => "Eritrea",
        "Estonia", //"EE" => "Estonia",
        "Ethiopia", //"ET" => "Ethiopia",
        "Falkland Islands", //"FK" => "Falkland Islands",
        "Faroe Islands", //"FO" => "Faroe Islands",
        "Fiji", //"FJ" => "Fiji",
        "Finland", //"FI" => "Finland",
        "France", //"FR" => "France",
        "French Guiana", //"GF" => "French Guiana",
        "French Polynesia", //"PF" => "French Polynesia",
        "French Southern Territories", //"TF" => "French Southern Territories",
        "French Southern and Antarctic Territories", //"FQ" => "French Southern and Antarctic Territories",
        "Gabon", //"GA" => "Gabon",
        "Gambia", //"GM" => "Gambia",
        "Georgia", //"GE" => "Georgia",
        "Germany", //"DE" => "Germany",
        "Ghana", //"GH" => "Ghana",
        "Gibraltar", //"GI" => "Gibraltar",
        "Greece", //"GR" => "Greece",
        "Greenland", //"GL" => "Greenland",
        "Grenada", //"GD" => "Grenada",
        "Guadeloupe", //"GP" => "Guadeloupe",
        "Guam", //"GU" => "Guam",
        "Guatemala", //"GT" => "Guatemala",
        "Guernsey", //"GG" => "Guernsey",
        "Guinea", //"GN" => "Guinea",
        "Guinea-Bissau", //"GW" => "Guinea-Bissau",
        "Guyana", //"GY" => "Guyana",
        "Haiti", //"HT" => "Haiti",
        "Heard Island and McDonald Islands", //"HM" => "Heard Island and McDonald Islands",
        "Honduras", //"HN" => "Honduras",
        "Hong Kong SAR China", //"HK" => "Hong Kong SAR China",
        "Hungary", //"HU" => "Hungary",
        "Iceland", //"IS" => "Iceland",
        "India", //"IN" => "India",
        "Indonesia", //"ID" => "Indonesia",
        "Iran", //"IR" => "Iran",
        "Iraq", //"IQ" => "Iraq",
        "Ireland", //"IE" => "Ireland",
        "Isle of Man", //"IM" => "Isle of Man",
        "Israel", //"IL" => "Israel",
        "Italy", //"IT" => "Italy",
        "Jamaica", //"JM" => "Jamaica",
        "Japan", //"JP" => "Japan",
        "Jersey", //"JE" => "Jersey",
        "Johnston Island", //"JT" => "Johnston Island",
        "Jordan", //"JO" => "Jordan",
        "Kazakhstan", //"KZ" => "Kazakhstan",
        "Kenya", //"KE" => "Kenya",
        "Kiribati", //"KI" => "Kiribati",
        "Kuwait", //"KW" => "Kuwait",
        "Kyrgyzstan", //"KG" => "Kyrgyzstan",
        "Laos", //"LA" => "Laos",
        "Latvia", //"LV" => "Latvia",
        "Lebanon", //"LB" => "Lebanon",
        "Lesotho", //"LS" => "Lesotho",
        "Liberia", //"LR" => "Liberia",
        "Libya", //"LY" => "Libya",
        "Liechtenstein", //"LI" => "Liechtenstein",
        "Lithuania", //"LT" => "Lithuania",
        "Luxembourg", //"LU" => "Luxembourg",
        "Macau SAR China", //"MO" => "Macau SAR China",
        "Macedonia", //"MK" => "Macedonia",
        "Madagascar", //"MG" => "Madagascar",
        "Malawi", //"MW" => "Malawi",
        "Malaysia", //"MY" => "Malaysia",
        "Maldives", //"MV" => "Maldives",
        "Mali", //"ML" => "Mali",
        "Malta", //"MT" => "Malta",
        "Marshall Islands", //"MH" => "Marshall Islands",
        "Martinique", //"MQ" => "Martinique",
        "Mauritania", //"MR" => "Mauritania",
        "Mauritius", //"MU" => "Mauritius",
        "Mayotte", //"YT" => "Mayotte",
        "Metropolitan France", //"FX" => "Metropolitan France",
        "Mexico", //"MX" => "Mexico",
        "Micronesia", //"FM" => "Micronesia",
        "Midway Islands", //"MI" => "Midway Islands",
        "Moldova", //"MD" => "Moldova",
        "Monaco", //"MC" => "Monaco",
        "Mongolia", //"MN" => "Mongolia",
        "Montenegro", //"ME" => "Montenegro",
        "Montserrat", //"MS" => "Montserrat",
        "Morocco", //"MA" => "Morocco",
        "Mozambique", //"MZ" => "Mozambique",
        "Myanmar [Burma]", //"MM" => "Myanmar [Burma]",
        "Namibia", //"NA" => "Namibia",
        "Nauru", //"NR" => "Nauru",
        "Nepal", //"NP" => "Nepal",
        "Netherlands", //"NL" => "Netherlands",
        "Netherlands Antilles", //"AN" => "Netherlands Antilles",
        "Neutral Zone", //"NT" => "Neutral Zone",
        "New Caledonia", //"NC" => "New Caledonia",
        "New Zealand", //"NZ" => "New Zealand",
        "Nicaragua", //"NI" => "Nicaragua",
        "Niger", //"NE" => "Niger",
        "Nigeria", //"NG" => "Nigeria",
        "Niue", //"NU" => "Niue",
        "Norfolk Island", //"NF" => "Norfolk Island",
        "North Korea", //"KP" => "North Korea",
        "North Vietnam", //"VD" => "North Vietnam",
        "Northern Mariana Islands", //"MP" => "Northern Mariana Islands",
        "Norway", //"NO" => "Norway",
        "Oman", //"OM" => "Oman",
        "Pacific Islands Trust Territory", //"PC" => "Pacific Islands Trust Territory",
        "Pakistan", //"PK" => "Pakistan",
        "Palau", //"PW" => "Palau",
        "Palestinian Territories", //"PS" => "Palestinian Territories",
        "Panama", //"PA" => "Panama",
        "Panama Canal Zone", //"PZ" => "Panama Canal Zone",
        "Papua New Guinea", //"PG" => "Papua New Guinea",
        "Paraguay", //"PY" => "Paraguay",
        "People's Democratic Republic of Yemen", //"YD" => "People's Democratic Republic of Yemen",
        "Peru", //"PE" => "Peru",
        "Philippines", //"PH" => "Philippines",
        "Pitcairn Islands", //"PN" => "Pitcairn Islands",
        "Poland", //"PL" => "Poland",
        "Portugal", //"PT" => "Portugal",
        "Puerto Rico", //"PR" => "Puerto Rico",
        "Qatar", //"QA" => "Qatar",
        "Romania", //"RO" => "Romania",
        "Russia", //"RU" => "Russia",
        "Rwanda", //"RW" => "Rwanda",
        "Réunion", //"RE" => "Réunion",
        "Saint Barthélemy", //"BL" => "Saint Barthélemy",
        "Saint Helena", //"SH" => "Saint Helena",
        "Saint Kitts and Nevis", //"KN" => "Saint Kitts and Nevis",
        "Saint Lucia", //"LC" => "Saint Lucia",
        "Saint Martin", //"MF" => "Saint Martin",
        "Saint Pierre and Miquelon", //"PM" => "Saint Pierre and Miquelon",
        "Saint Vincent and the Grenadines", //"VC" => "Saint Vincent and the Grenadines",
        "Samoa", //"WS" => "Samoa",
        "San Marino", //"SM" => "San Marino",
        "Saudi Arabia", //"SA" => "Saudi Arabia",
        "Senegal", //"SN" => "Senegal",
        "Serbia", //"RS" => "Serbia",
        "Serbia and Montenegro", //"CS" => "Serbia and Montenegro",
        "Seychelles", //"SC" => "Seychelles",
        "Sierra Leone", //"SL" => "Sierra Leone",
        "Singapore", //"SG" => "Singapore",
        "Slovakia", //"SK" => "Slovakia",
        "Slovenia", //"SI" => "Slovenia",
        "Solomon Islands", //"SB" => "Solomon Islands",
        "Somalia", //"SO" => "Somalia",
        "South Africa", //"ZA" => "South Africa",
        "South Georgia and the South Sandwich Islands", //"GS" => "South Georgia and the South Sandwich Islands",
        "South Korea", //"KR" => "South Korea",
        "Spain", //"ES" => "Spain",
        "Sri Lanka", //"LK" => "Sri Lanka",
        "Sudan", //"SD" => "Sudan",
        "Suriname", //"SR" => "Suriname",
        "Svalbard and Jan Mayen", //"SJ" => "Svalbard and Jan Mayen",
        "Swaziland", //"SZ" => "Swaziland",
        "Sweden", //"SE" => "Sweden",
        "Switzerland", //"CH" => "Switzerland",
        "Syria", //"SY" => "Syria",
        "São Tomé and Príncipe", //"ST" => "São Tomé and Príncipe",
        "Taiwan", //"TW" => "Taiwan",
        "Tajikistan", //"TJ" => "Tajikistan",
        "Tanzania", //"TZ" => "Tanzania",
        "Thailand", //"TH" => "Thailand",
        "Timor-Leste", //"TL" => "Timor-Leste",
        "Togo", //"TG" => "Togo",
        "Tokelau", //"TK" => "Tokelau",
        "Tonga", //"TO" => "Tonga",
        "Trinidad and Tobago", //"TT" => "Trinidad and Tobago",
        "Tunisia", //"TN" => "Tunisia",
        "Turkey", //"TR" => "Turkey",
        "Turkmenistan", //"TM" => "Turkmenistan",
        "Turks and Caicos Islands", //"TC" => "Turks and Caicos Islands",
        "Tuvalu", //"TV" => "Tuvalu",
        "U.S. Minor Outlying Islands", //"UM" => "U.S. Minor Outlying Islands",
        "U.S. Miscellaneous Pacific Islands", //"PU" => "U.S. Miscellaneous Pacific Islands",
        "U.S. Virgin Islands", //"VI" => "U.S. Virgin Islands",
        "Uganda", //"UG" => "Uganda",
        "Ukraine", //"UA" => "Ukraine",
        "Union of Soviet Socialist Republics", //"SU" => "Union of Soviet Socialist Republics",
        "United Arab Emirates", //"AE" => "United Arab Emirates",
        "United Kingdom", //"GB" => "United Kingdom",
        "United States", //"US" => "United States",
        "Unknown or Invalid Region", //"ZZ" => "Unknown or Invalid Region",
        "Uruguay", //"UY" => "Uruguay",
        "Uzbekistan", //"UZ" => "Uzbekistan",
        "Vanuatu", //"VU" => "Vanuatu",
        "Vatican City", //"VA" => "Vatican City",
        "Venezuela", //"VE" => "Venezuela",
        "Vietnam", //"VN" => "Vietnam",
        "Wake Island", //"WK" => "Wake Island",
        "Wallis and Futuna", //"WF" => "Wallis and Futuna",
        "Western Sahara", //"EH" => "Western Sahara",
        "Yemen", //"YE" => "Yemen",
        "Zambia", //"ZM" => "Zambia",
        "Zimbabwe", //"ZW" => "Zimbabwe",
        "Åland Islands", //"AX" => "Åland Islands",
    ];
}

function getApplicationId($exporter_id)
{
    return \App\Models\tbl_application_details::select('id')->where('exporter_id', $exporter_id)->first()->id ?? '';
}

/**
 * Method IND_money_format
 *
 * @param $number $number [explicite description]
 *
 * Usage
 * $price = IND_money_format(500000000.26);
 *  echo $price;
 * @return void
 */
function IND_money_format($number)
{
    $decimal   = (string) ($number - floor($number));
    $money     = floor($number);
    $length    = strlen($money);
    $delimiter = '';
    $money     = strrev($money);

    for ($i = 0; $i < $length; $i++) {
        if (($i == 3 || ($i > 3 && ($i - 1) % 2 == 0)) && $i != $length) {
            $delimiter .= ',';
        }
        $delimiter .= $money[$i];
    }

    $result  = strrev($delimiter);
    $decimal = preg_replace("/0\./i", ".", $decimal);
    $decimal = substr($decimal, 0, 3);

    if ($decimal != '0') {
        $result = $result . $decimal;
    }

    return $result;
}

function so_status_array($status_id)
{
    $arr = [
        1  => 'Pending',
        2  => 'Verified',
        3  => '',
        4  => 'Verified by director depm',
        5  => 'Not Verified by DIRDEPM',
        6  => 'Verified by Addl Special secretory',
        7  => 'Not verified by Addl / Spl Secretory',
        8  => 'Approved',
        9  => 'Not Approved by Department Secretory',
        10 => 'Application Rejected',
        11 => 'Payment Released',
    ];
    return $arr[$status_id];
}

function dir_status_array($status_id)
{
    $arr = [
        1  => 'Applied',
        2  => 'Pending',
        3  => '',
        4  => 'Verified',
        5  => 'Not Verified',
        6  => 'Verified by Addl Special secretory',
        7  => 'Not verified by Addl / Spl Secretory',
        8  => 'Approved',
        9  => 'Not Approved by Department Secretory',
        10 => 'Application Rejected',
        11 => 'Payment Released',
    ];
    return $arr[$status_id];
}

function addl_status_array($status_id)
{
    $arr = [
        1  => 'Applied',
        2  => 'Verified by SO',
        3  => '',
        4  => 'Pending',
        5  => 'Not Verified by DIR DEPM',
        6  => 'Verified',
        7  => 'Not verified',
        8  => 'Approved',
        9  => 'Not Approved by Department Secretory',
        10 => 'Application Rejected',
        11 => 'Payment Released',
    ];
    return $arr[$status_id];
}

function dept_sectry_status_array($status_id)
{
    $arr = [
        1  => 'Applied',
        2  => 'Verified by SO',
        3  => '',
        4  => 'Verified by Director, DEPM',
        5  => 'Not Verified by DIR DEPM',
        6  => 'Pending',
        7  => 'Not verified by Addl / Spl Secretory',
        8  => 'Approved',
        9  => 'Not Approved by Department Secretory',
        10 => 'Application Rejected',
        11 => 'Payment Released',
    ];
    return $arr[$status_id];
}

function ddo_status_array($status_id)
{
    $arr = [
        1  => 'Applied',
        2  => 'Verified by SO',
        3  => '',
        4  => 'Verified by Director, DEPM',
        5  => 'Not Verified by DIR DEPM',
        6  => 'Pending',
        7  => 'Not verified by Addl / Spl Secretory',
        8  => 'Approved',
        9  => 'Not approved by Department Secretory',
        10 => 'Applictaion Rejected',
        11 => 'Payment Released',
    ];
    return $arr[$status_id];
}

function exporter_status_array($status_id)
{
    $arr = [
        1  => 'Applied',
        2  => 'Accepted',
        3  => '',
        4  => 'Under Process',
        5  => 'Not Accepted by DIR DEPM',
        6  => 'Under Process',
        7  => 'Not Approved by Addl Spl Secretory',
        8  => 'Approved',
        9  => 'Not Approved by Department Secretory',
        10 => 'Application Rejected',
        11 => 'Payment Released',
    ];
    return $arr[$status_id];
}

function status_color_array($status)
{
    // echo '{'.$status.'}';
    $color_code = [];

    if (in_array($status, ['Applied', 'Verified by SO', 'Verified', 'Verified', 'Verified by director depm', 'Verified by Addl Special secretory', 'Verified by Director, DEPM'])) {
        $color_code = ['#f5f94a', 'dark']; // Yellow
    } else if (in_array($status, ['Approved', 'Payment Released'])) {
        $color_code = ['#0e5306', 'white']; // Green
    } else if (in_array($status, ['Pending', 'Accepted'])) {
        $color_code = ['#e5a01e', 'dark']; // Orange
    } else if (in_array($status, ['Under Process'])) {
        $color_code = ['#34e7c8', 'white']; // Aqua-Green/Blue
    } else {
        $color_code = ['#cd2323', 'white']; // Red
    }

    return $color_code;
}

function store_files($path, $file_name, $file)
{
    return $file->move(public_path() . '/' . 'storage/' . $path, $file_name);
}

// make a pending list as per the roles and call in one side bar
function get_pending_list_count_for_admin($role_id)
{
    // $role_id       = Auth::user()->role_id;
    $pending_count = 0;
    switch ($role_id) {
        case 2:$pending_count = App\Models\tbl_application_details::where('status', 1)->count();
            break;

        case 3:$pending_count = App\Models\tbl_application_details::where('status', 2)->count();
            break;

        case 4:$pending_count = App\Models\tbl_application_details::where('status', 4)->count();
            break;

        case 5:$pending_count = App\Models\tbl_application_details::where('status', 6)->count();
            break;

        case 7:$pending_count = App\Models\tbl_application_details::where('status', 8)->count();
            break;

        default:'';
            break;
    }

    // $r = ['', '', 'SO', 'DIRDEPM', 'ADDL SPL SCRTY', 'DEPT SERCTY', '', 'DDO'];
    // dd([$r[$role_id], $pending_count]);
    return $pending_count;
}

// make a pending list as per the roles and call in one side bar
function get_pending_applied_list_count_for_admin($role_id)
{
    // $role_id       = Auth::user()->role_id;
    $pending_count = 0;
    switch ($role_id) {
        case 2:$pending_count = App\Models\tbl_application_details::where('status', 1)->count();
            break;

        case 3:$pending_count = App\Models\tbl_application_details::where('status', 2)->count();
            break;

        case 4:$pending_count = App\Models\tbl_application_details::where('status', 4)->count();
            break;

        case 5:$pending_count = App\Models\tbl_application_details::where('status', 6)->count();
            break;

        case 7:$pending_count = App\Models\tbl_application_details::where('status', 8)->count();
            break;

        default:'';
            break;
    }

    // $r = ['', '', 'SO', 'DIRDEPM', 'ADDL SPL SCRTY', 'DEPT SERCTY', '', 'DDO'];
    // dd([$r[$role_id], $pending_count]);
    return $pending_count;
}

// make a pending list as per the roles and call in one side bar
function get_sanctioned_applied_list_count_for_admin($role_id)
{
    // $role_id       = Auth::user()->role_id;
    $pending_count = 0;
    switch ($role_id) {
        case 2:$pending_count = App\Models\tbl_application_details::where('status', 8)->count();
            break;

        case 3:$pending_count = App\Models\tbl_application_details::where('status', 8)->count();
            break;

        case 4:$pending_count = App\Models\tbl_application_details::where('status', 8)->count();
            break;

        case 5:$pending_count = App\Models\tbl_application_details::where('status', 8)->count();
            break;

        case 7:$pending_count = App\Models\tbl_application_details::where('status', 8)->count();
            break;

        default:'';
            break;
    }

    // $r = ['', '', 'SO', 'DIRDEPM', 'ADDL SPL SCRTY', 'DEPT SERCTY', '', 'DDO'];
    // dd([$r[$role_id], $pending_count]);
    return $pending_count;
}

function common_file_upload($file, $file_path_array)
{
    // return [$file, $file_path_array];

    try {
        $image     = $file;
        $file_name = $file_path_array['file_name'] . substr(sha1($image . uniqid('', true)), 20, 5) . date('my') . $image->getClientOriginalName();
        $image->storeAs('public/images/exporters/applications/' . $file_path_array['appl_id'] . '/' . $file_path_array['folder_name'] . '/', $file_name);
        return $file_name;
    } catch (\Exception $e) {
        return response($e->getMessage(), 500);
    }
}
