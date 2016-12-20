<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

class route_controller extends Controller
{

    public function booking(){
      //$routes = DB::select('select * from route');
        $places1 = DB::select('select distinct place1 from route');
        $places2 = DB::select('select distinct place2 from route');
      // var_dump($places1[1]->place1);
        return view('index',compact('places1','places2'));
    }

    public function booking1(){
        $routes = DB::select('select * from route');
        return view('timetable',compact('routes'));
    }

    public function showBus(Request $request){

        $dep = $request->departure;
        $arr = $request->arrival;
        $date = $request->date;
        //var_dump($request->arrival);
        //$dep     = mysqli_real_escape_string($dep);
       $places = DB::select(DB::raw("select s.schedule_id,  b.bus_id, b.company_name, b.bus_type, b.fare, b.total_seats, s.departure_time, s.arrival_time from bus as b JOIN schedule as s on b.bus_id=s.bus_id WHERE b.route_id = ( SELECT route_id from route WHERE route.place1 = '$dep' AND route.place2 = '$arr'  )"));
    //    $places = DB::select(DB::raw("select s.schedule_id,  b.bus_id, b.company_name, b.bus_type, b.fare, b.total_seats, s.departure_time, s.arrival_time from bus as b JOIN schedule as s on b.bus_id=s.bus_id WHERE (s.departure_id = (select town.town_id from town where town.town_name = '$dep'))  AND b.route_id = ( SELECT route_id from route WHERE route.place1 = '$dep' AND route.place2 = '$arr'  )"))
       return view('timetable',compact('places','dep','arr','date'));
       // var_dump($places);
    }

    public function  showSeats(Request $request){
        //$dep = $request->dep;
        //$arr = $request->all();
        var_dump($this->dates);
    }

    public function insertroute(Request $request){
        $route_id=(int)$request->routeid;
        $place_1=$request->place1;
        $place_2=$request->place2;
        $sql="INSERT INTO route (route_id,place1,place2) VALUES('$route_id', '$place_1', '$place_2')";
        DB::connection()->getPdo()->exec($sql);

        return view('addroute');
        //var_dump($route_id);
    }

    public function getroute(){
        return view('addroute');
    }

    public function addnewBus(Request $request){
        $bus_id= (int)$request->busid;
        $route_id=(int)$request->routeid;
        $company=$request->company;
        $bus_type=$request->bustype;
        $fare=(int)$request->fare;
        $total_seats=(int)$request->tseats;
        // $busids=DB::select(select bus_id from bus;

      //  var_dump($route_id);
        $sql="INSERT INTO bus ( bus_id, route_id, company_name, bus_type, fare, total_seats ) VALUES ('$bus_id', '$route_id','$company','$bus_type','$fare','$total_seats')";
        DB::connection()->getPdo()->exec($sql);
        $routes = DB::select('select * from route');

         return view('addnewbus',compact('routes'));
    }
    public function getnewbus(){
        $routes = DB::select('select * from route');
        return view('addnewbus',compact('routes'));
    }



}
