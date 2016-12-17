<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Input;


use App\Http\Requests;

class page_controller extends Controller
{
	 public function showIndex()
    {
     $places=DB::table('route')->get();
     
        
                   
        return view('index',compact('places'));
     }
     public function showSearchResult(Request $request){
     	$input=DB::table('route');
     	$input->date=$request->date;
     	
     	return view('search',compact('input'));
     }

     public function showPage(){
         //$seat=DB::select('select seat from booking_seat');
         $se=DB::table('booking_seat')->get();
         //$s=$se[0];
       //$posts = DB::table('posts')->where('thread_id', '=', $thread_id)->get();
        //$se=(array)$se;
         //$y=s[0];


//         foreach($se as $s)
//            {{$s->seat}}
//
//         endforeach

        // return view('seat',compact('y'));
        // var_dump($seat);


         $arr =  array();
         foreach ($se as $key => $object) {
             array_push($arr,$object->seat);

             //echo $object->seat;
         }
//         echo $arr[0];
//
//         echo $arr[1];

         return view('seats',compact('arr'));
     }

    public function showSeatPage(){
        $se=DB::select('select seat from booking_seat');
        $arr =  array();
        $tot_seats=DB::select('select total_seats from bus');


        foreach ($se as $key => $object) {
            array_push($arr,$object->seat);

            //echo $object->seat;
        }
//         echo $arr[0];
//
//         echo $arr[1];
        $tot_seat=$tot_seats[0]->total_seats;
        return view('seat2',compact('arr','tot_seat'));

    }
    public  function showselectedseat(Request $request){
        var_dump($request->arra);
    }
}
