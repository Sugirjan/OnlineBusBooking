<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;








class login_controller extends Controller
{

    public function show(Request $request){


        return view('includes/process_login',compact($request));
    }

    public function show4(Request $request){
        //var_dump($request->all());

       return view('includes/register_inc',compact($request));
    }


    public function show3(){



        return view('includes/logout');
    }

//    public function show5(){
//
//        sec_session_start();
//        if($_SESSION['username']=='admin')
//            return view('includes/logout');
//        else return ('You have no access ');
//
//
//    }
}
