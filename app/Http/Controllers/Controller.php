<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function redirect(){

        $checkUserRole = Auth::user()->roles;
        $roleUser = $checkUserRole->where('name','user');

        if($roleUser->isEmpty())
        {
            return redirect()->route('admin.dashboard');
        }
        else{

            return redirect()->route('dashboard');
        }
    }
}
