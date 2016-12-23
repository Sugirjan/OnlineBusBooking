<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

session_start();
function loggedin()
{
    if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
        return true;
    } else {
        return false;
    }
}


class UserController extends Controller
{
    public static $privilage=true;
    public function activation(Request $request){
        //var_dump($request);
        $user_id=$request['u_id'];
        $user_status=$request['u_status'];
        if ($user_status=='a'){
            //var_dump($user_status);
            DB::table('busoperator')
                ->where('operator_id', @$user_id)
                ->update(['status' => 'd']);

        }elseif ($user_status=='d'){
            DB::table('busoperator')
                ->where('operator_id', @$user_id)
                ->update(['status' => 'a']);
        }
        //var_dump($request['u_status']);
        return redirect()-> back();
    }


    public function postSignIn(Request $request)
    {

        $UserName=$request['username'];
        $Password1=$request['password'];
        $sql1=DB::table('ntcadmin')-> where('Password' , $Password1)->where('user_name' , $UserName)->First();
        if (($sql1)!= null ){
            self::$privilage=true;
            $adminId=$sql1->Admin_id;
            $_SESSION['user_id']=$adminId;

            //$user_id=$resultArray['Admin_id'];


            //var_dump($sql1->password);
            //echo "It is right";

            return redirect()-> route('about');

        }
        else{
            //var_dump(self::$privilage);
            //echo "Every thing is alright";
            return redirect()-> back();
        }

    }
//	public function hasPrivilage(){
//	    return (bool) $this->privilage;
//    }
}
