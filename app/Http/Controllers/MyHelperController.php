<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyHelperController extends Controller
{
    public function checkMyHelper(){

        $name = nameFirstLetterCap("user1");
        $nameUpper = nameUpper("user1");
        $arr = myArr();

        return // $arr
            '<div style="font-size: 30px; padding:20px; text-align: center">

                Function 1: <strong>'.$name.'</strong><br>
                Function 2: <strong>'.$nameUpper.'</strong><br>

            </div>';
    }
}
