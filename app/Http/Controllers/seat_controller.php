<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use DB;
use Input;
use App\Http\Controllers\route_controller;


use App\Http\Requests;

class seat_controller extends controller
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
         $arr =  array();
         foreach ($se as $key => $object) {
             array_push($arr,$object->seat);
         }
         return view('seats',compact('arr'));
     }

    public function showSeatPage(Request $request){
        $dates = $request->date;
        $schedule_id = $request->schedule_id;
        $se=DB::select("select seat from booking_seat , booking where booking_seat.booking_id in ( select booking.booking_id from booking where booking.schedule_id = '$schedule_id' and booking.date = '$dates' )");
        $arr =  array();
       // $tot_seats=DB::select('select total_seats from bus');
        foreach ($se as $key => $object) {
            array_push($arr,$object->seat);
        }
        $bus_id = $request->bus_id;

        $total_seats = DB::select("select total_seats from bus where bus_id = '$bus_id'");
        $tot_seat = $total_seats[0]->total_seats;
        $dates = $request->date;
        $depar = $request->dep;
        $arriv = $request->arr;
        $fare=(int)$request->fare;
       return view('seats',compact('arr','tot_seat','dates','depar','arriv','fare','bus_id','schedule_id'));
    //   var_dump($arr);
//        $this->dept = new de
  //     var_dump($depar);
    }

    public  function showselectedseat(Request $request){
        var_dump($request);

    }

    public function getOccupiedSeats(Request $request){
        $data = json_decode($request->input('dta'),'true');
      //  var_dump($data);
     //   return view('lastStep',compact('data'));
      //  $bus_id = $request->dta[2];
//        $schedule_id = $request->schedule_id;
//                $dates = $request->date;
//        $depar = $request->dep;
//        $arriv = $request->arr;
//        $fare=(int)$request->fare;
       //return view('lastStep');
        return response()->json($data);
     }

    public  function payment(Request $request){
    }

    public  function end(Request $request){
        $bus_id = (int)($request->bus_id);
        $schedule_id = (int)($request->schedule_id);
        $dates = $request->dates;
        $depar = $request->depar;
        $seats= json_decode($request->seats);
        $arriv = $request->arriv;
        $fname = $request->fname;
        $amount= (int)($request->amount);
        $number = (int)($request->number);
//        if (get_magic_quotes_gpc())
//        {
//            $fname = stripslashes( DB::connection(bus_booking),$fname);
//        }
//        $fname = mysqli_real_escape_string($fname);
        if($request->submit=="Submit") {
            $sql = "INSERT INTO booking (schedule_id, name, phone_no, date , fare ) VALUES('$schedule_id','$fname','$number','$dates','$amount' )";
            DB::connection()->getPdo()->exec($sql);
            $maxs = DB::select('select max(booking_id) as a from booking');
            foreach ($maxs as $at)
                $id = $at->a;
            foreach ($seats as $seat) {
                $sql2 = "insert into booking_seat ( booking_id , seat ) values ( '$id' , '$seat' )";
                DB::connection()->getPdo()->exec($sql2);
            }
            echo "<script type='text/javascript'>alert('Your seats are booked')</script>";
            return redirect()->action('route_controller@booking');
        }
        elseif ($request->submit=="Cancel"){
            return redirect()->action('route_controller@booking');
        }


    }

}




