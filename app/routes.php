<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function () {
    return View::make('login');
});

/*Code route của trang login*/

Route::get('login.app', function () {
    return View::make('login');
});

Route::post('take_login.app', function () {
    $ipall = Input::all();
//    var_dump($ipall);
    return View::make('action.take_login', array(
        'USERNAME' => $ipall['USERNAME'],
        'PASSWORD' => $ipall['PASSWORD']
    ));
});

/*LogOut*/

Route::get('logout.app', function () {
    return View::make('action.take_logout');
});

/*Code cho trang admin CP*/

Route::get('admincp.app', function () {
    return View::make('admin');
});


/*Code cho trang Phong*/

Route::get('phong.app', function () {
    return View::make('phong');
});

Route::post('add_lich.app',function(){
    return View::make('action.phong.add_lich',Input::all());
});

/*Code cho trang maytinh*/
Route::get('maytinh.app', function () {
    return View::make('maytinh');
});

/*Other Code*/

Route::get('test.app', function () {
//    $phongResults = DB::table('PHONG')->orderBy('MA_PHONG', 'asc')->get();
//    $i = 0;
//    foreach ($phongResults as $value) {
//        var_dump($value);
//        $phong[$i] = new PHONG($value->MA_PHONG, $value->TEN_PHONG, $value->SLUONG_MAY);
//        echo $phong[$i]->MA_PHONG;
//        echo '<br>';$i++;
//    }
//    return View::make('Templates.phong.ListPhong_InLichPhong');

    $res = DB::select("SELECT
	NGUOIDUNG.TEN_ND AS TEN_ND,
	PHANCONG.BUOIDAY AS BUOI_DAY,
	PHANCONG.NGAYDAY AS NGAY_DAY,
	PHANCONG.NGUOIDAY AS NGUOI_DAY,
	CONGVIEC.NOIDUNG_CVIEC AS NOI_DUNG,
	PHONG.TEN_PHONG AS TEN_PHONG
FROM
	PHANCONG
INNER JOIN CONGVIEC ON PHANCONG.STT_CVIEC = CONGVIEC.STT_CVIEC
INNER JOIN NGUOIDUNG ON PHANCONG.MA_ND = NGUOIDUNG.ID
INNER JOIN PHONG ON PHANCONG.MA_PHONG = PHONG.MA_PHONG
ORDER BY
NGAY_DAY ASC,
PHANCONG.MA_PHONG ASC
");


    var_dump($res);
});

Route::get('test2.app',function(){
    $var1 = "Hello";
    $var2 = "hello";
    if (strcasecmp($var1, $var2) == 0) {
        echo '$var1 is equal to $var2 in a case-insensitive string comparison';
    }
});

