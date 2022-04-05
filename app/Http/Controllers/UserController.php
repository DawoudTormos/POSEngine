<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function login(request $request){
    
        $DB = mysqli_connect( 'localhost' , 'root', '' , 'project1' )or die("cannot connect");
        $pathh = "layouts";

        return view('Myauth/login',[
                                        'request'=>$request,
                                        'DB'=>$DB,
                                        'pathh' => $pathh
        ]);
    }
    
}
