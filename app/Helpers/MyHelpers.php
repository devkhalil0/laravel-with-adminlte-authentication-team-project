<?php

use Illuminate\Support\Str;


function nameFirstLetterCap($value){
    $name = Str::ucfirst($value);

    return $name;
}

function nameUpper($value){
    $name = Str::upper($value);

    return $name;
}

function myArr(){
    $arr =  [
            'name' => 'name',
            'email' => 'email@email.com',
            'address' => 'address',
            ];

    return $arr;
}



