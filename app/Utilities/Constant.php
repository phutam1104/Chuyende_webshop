<?php

namespace App\Utilities;

class Constant
{
    const user_level_host=0;
    const user_level_admin=1;
    const user_level_client=2;
    public static $user_level=[
        self::user_level_host=>'Quản lí',
        self::user_level_admin=>'Nhân viên',
        self::user_level_client=>'Khách hàng'
    ];
}
