<?php


namespace App\Http\Controllers;


interface HouseStatus
{
    const EMPTY = 'Đang trống';
    const INHABITED = 'Đang có người thuê';
    const REPAIR = 'Đang sửa chữa';
    const ONEDAY = 1;
}
