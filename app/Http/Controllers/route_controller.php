<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

class route_controller extends Controller
{

    public static function booking(){

        $places1 = DB::select('select town_name from town');
        $places2 = $places1;
        return view('index',compact('places1','places2'));
    }

    public function showBus(Request $request){
        $dep = $request->departure;
        $arr = $request->arrival;
        $date = $request->date;
        //$places = DB::select(DB::raw("select s.schedule_id,  b.bus_id, b.company_name, b.bus_type, b.fare, b.total_seats, s.departure_time, s.arrival_time from bus as b JOIN schedule as s on b.bus_id=s.bus_id WHERE (s.departure_id = (select town.town_id from town where town.town_name = '$dep'))  AND b.route_id = ( SELECT route_id from route WHERE route.place1 = '$dep' AND route.place2 = '$arr'  )"));

        if($dep!=$arr and $date != "" and $dep != NULL and $arr != NULL){
            $places = DB::select("select schedule_id,  bus_id, company_name, bus_type, fare, total_seats, departure_time, arrival_time from bus_schedule WHERE (departure_id = (select town.town_id from town where town.town_name = '$dep'))  AND bus_schedule.route_id = ( SELECT route_id from route WHERE ( route.place1 = '$dep' AND route.place2 = '$arr') or ( route.place2 = '$dep' AND route.place1 = '$arr') )");
            return view('timetable',compact('places','dep','arr','date'));
        }
        else{
            echo "<script type='text/javascript'>alert('destination and arrival places are same')</script>";
            return redirect()->action('route_controller@booking');
          //  return view('return');
        }
        //var_dump($dep);
    }

    public function register(Request $request){
        $name=$request->form_name;
        $email=$request->form_email;
        $pass1=$request->form_pass1;
        $pass2=$request->form_pass2;
        //var_dump($name);
        if($pass1==$pass2){
            $sql = "INSERT INTO busoperator ( company_name , email , password,status ) VALUES('$name', '$email','$pass1','d')";
            DB::connection()->getPdo()->exec($sql);
            echo "<script type='text/javascript'>alert('registered!')</script>";
        }
        else{
            echo "<script type='text/javascript'>alert('password is wrong!')</script>";
            return view('register');
        }
    }

    public function insertroute(Request $request){  //add new route
        $route_id=(int)$request->routeid;
        $place_1=$request->place1;
        $place_2=$request->place2;
        $towns = DB::select('select * from town');
        $routes = DB::select("select * from route where route_id='$route_id'");
        $check1 = DB::select("select * from route where place1='$place_2' and place2='$place_1'");
        $check2 = DB::select("select * from route where place1='$place_1' and place2='$place_2'");
        if($request->Submit=="Submit"){
            if(sizeof($routes)==0  && $place_1 != $place_2 && sizeof($check1)==0 && sizeof($check2)==0){
                //var_dump($routes);
                $sql = "INSERT INTO route (route_id,place1,place2,status) VALUES('$route_id', '$place_1', '$place_2','a')";
                DB::connection()->getPdo()->exec($sql);
                \Session::flash('flash_message','successfully updated.');
            }elseif(sizeof($routes)!=0 && sizeof($check2)!=0 ){
                foreach($routes as $routes1){
                    $status1=$routes1->status;
                }
                if($status1=='d'){
                    DB::table('route')
                        ->where('route_id', @$route_id)
                        ->update(['status' => 'a']);
                    echo "<script type='text/javascript'>alert('successfully added! ')</script>";
                }

            }
            else{
                echo "<script type='text/javascript'>alert('Duplicate values! ')</script>";
            }
            return view('addroute',compact('towns'));
        }
        elseif ($request->Cancel=="Cancel And Go Back"){
            $users = DB::select('Select operator_id,company_name,status from busoperator');
            $routes= DB::select("SELECT * FROM route where status='a' ");
            return view('NTC',compact('users','routes'));
        }
    }

    public function getroute(){   //get route adding form
        // Session::flash('success', 'You have been successfully logged out!');

        $towns = DB::select('select * from town');
        // return view('addnewbus',compact('routes'))
        return view('addroute',compact('towns'));

    }

    public function addnewBus(Request $request){  //add new bus to db
        $bus_id= (int)$request->busid;
        $route_id=(int)$request->routeid;
        $company=$request->company;
        $bus_type=$request->bustype;
        $fare=(int)$request->fare;
        $total_seats=(int)$request->tseats;
        $routes = DB::select('select * from route');
        $busids = DB::select("select * from bus where bus_id='$bus_id' ");
        if ($request->submit=="Submit"){
            if(sizeof($busids)==0 && $fare>0 && $bus_id>0 && $total_seats>0 ) {

                $sql = "INSERT INTO bus ( bus_id, route_id, company_name, bus_type, fare, total_seats, status ) VALUES ('$bus_id', '$route_id','$company','$bus_type','$fare','$total_seats','a')";
                DB::connection()->getPdo()->exec($sql);
                echo "<script type='text/javascript'>alert('successfully updated! ')</script>";
            }
            else{
                echo "<script type='text/javascript'>alert('Duplicate values! ')</script>";
            }
            return view('addnewbus',compact('routes'));
        }elseif ($request->cancel=="Cancel"){
            $buses= DB::select("SELECT * FROM bus where status='a'");
            return view('Operator',compact('buses'));
        }

    }
    public function getnewbus(){   //get bus form

        $routes = DB::select('select * from route');
        return view('addnewbus',compact('routes'));
    }

    public function addnewtown(Request $request){  //add new town to db
        $town_id=(int)$request->townid;
        $town=$request->town;

        $townids = DB::select("select * from town where town_id='$town_id' ");
        $townnames = DB::select("select * from town where town_name='$town' ");
        if($request->Submit=="Submit"){
            if(sizeof($townids)==0 && sizeof($townnames)==0 && $town_id>0) {
                $sql = "INSERT INTO town (town_id,town_name) VALUES('$town_id', '$town')";
                DB::connection()->getPdo()->exec($sql);
                echo "<script type='text/javascript'>alert('successfully updated! ')</script>";
            }
            else if (sizeof($townids)!=0 || sizeof($townnames)!=0){
                echo "<script type='text/javascript'>alert('Duplicate values! ')</script>";
            }
            return view('formaddtown');
        }elseif ($request->Cancel=="Cancel And Go Back"){
            $users = DB::select('Select operator_id,company_name,status from busoperator');
            $routes= DB::select("SELECT * FROM route where status='a' ");
            return view('NTC',compact('users','routes'));
        }


    }

    public function getnewtown() //get town form
    {   //get town adding form
        return view('formaddtown');
    }

    public function searchRoute(){  //search route
        $routes= DB::select("SELECT * FROM route where status='a' ");
        return view('formSearchRoute',compact('routes'));
    }

    public function getRouteDetails(Request $request){
        $route_id=(int)$request->routeid;
        $result =  DB::select("SELECT * FROM route where route_id='$route_id'");
        $towns= DB::select("SELECT * FROM town ");
        //var_dump($request->delete);
        if($request->search=="Update Route"){
            return view('updateRoute',compact('result','towns'));
        }elseif ($request->delete=="Delete Route"){
            return view('deleteroute',compact('result'));
        }elseif ($request->ADDR=="Add New Route"){
            return view('addroute',compact('towns'));
        }elseif ($request->ADDT=="Add New Town"){
            return view('formaddtown');
        }
    }

    public function deleteRoute(Request $request) //update route
    {
        $route_id=(int)$request->route_id;
        //var_dump($request->Confirm);
        if ($request->Confirm=="Confirm Delete Request"){
            DB::table('route')
                ->where('route_id', @$route_id)
                ->update(['status' => 'd']);
            $bus_id= DB::select("SELECT bus_id FROM bus where route_id='$route_id' ");
            foreach ($bus_id as $bus_id){
                $busId=$bus_id->bus_id;
                DB::table('bus')
                    ->where('bus_id', @$busId)
                    ->update(['status' => 'd']);
            }
            echo "<script type='text/javascript'>alert('successfully removed! ')</script>";
        }
//        $sql="create index indexopr on busoperator (operator_id,company_name,status)";
//        DB::connection()->getPdo()->exec($sql);

        $users = DB::select('Select operator_id,company_name,status from busoperator');
        $routes= DB::select("SELECT * FROM route where status='a' ");

        return view('NTC',compact('users','routes'));
    }


    public function updateRoute(Request $request) //update route
    {   //get town adding form

        $route_id=(int)$request->routeid;
        $place1=$request->place1;
        $place2=$request->place2;
        $check1 = DB::select("select * from route where place1='$place2' and place2='$place1'");
        $check2 = DB::select("select * from route where place1='$place1' and place2='$place2'");
        if($request->Update=="Update"){
//            var_dump($check2==null);
            if($check2==null && $check1==null ){
                $sql="UPDATE route set place1='$place1',place2='$place2' where route_id='$route_id'";
                DB::connection()->getPdo()->exec($sql);
                echo "<script type='text/javascript'>alert('successfully updated! ')</script>";
            }else{
                echo "<script type='text/javascript'>alert('Invalid input! ')</script>";
            }

            $result =  DB::select("SELECT * FROM route where route_id='$route_id'");
            $towns= DB::select("SELECT * FROM town ");
            return view('updateRoute',compact('result','towns'));
        }elseif ($request->Cancel=="Cancel"){
            $users = DB::select('Select operator_id,company_name,status from busoperator');
            $routes= DB::select("SELECT * FROM route where status='a' ");
            return view('NTC',compact('users','routes'));
        }
    }

    public function searchBus(){  //search route
        $buses= DB::select("SELECT * FROM bus where status='a'");
        return view('formSearchBus',compact('buses'));
    }

    public function getBusDetails(Request $request){  //get and update bus details
        $bus_id=(int)$request->busid;
        $result =  DB::select("SELECT * FROM bus where bus_id='$bus_id'");
        $routes= DB::select("SELECT * FROM route");
        $routes1= DB::select("SELECT * FROM route where route_id=(SELECT route_id FROM bus where bus_id='$bus_id')");
        //var_dump($routes);
        if($request->search=="Update Bus"){
            return view('updateBus',compact('result','routes'));
        }elseif ($request->delete=="Remove Or View Bus Details"){
            return view('deletebus',compact('result','routes1'));
        }elseif ($request->add=="Add New Bus"){
            $routes = DB::select('select * from route');
            return view('addnewbus',compact('routes'));
        }elseif ($request->addS=="Add New Schedule"){
            $busids = DB::select('select * from bus');//search route
            $places=DB::select('select * from town');
            return view('formAddschedule',compact('busids','places'));
        }
    }

    public function updatebus(Request $request) //update route
    {   //get town adding form
        $bus_id=(int)$request->busid;
        $routeid=(int)$request->routeid;
        $fare=(int)$request->fare;
        $seats=(int)$request->tseats;
        if ($request->update=="Update"){
            $sql="UPDATE bus set route_id='$routeid',fare='$fare', total_seats='$seats' where bus_id='$bus_id'";
            DB::connection()->getPdo()->exec($sql);
            echo "<script type='text/javascript'>alert('successfully updated! ')</script>";
        }
        $buses= DB::select("SELECT * FROM bus where status='a'");
        return view('Operator',compact('buses'));
    }
    public function deletebus(Request $request) //update route
    {
        $bus_id=(int)$request->bus_id;
        //var_dump($request->Confirm);
        if ($request->Confirm=="Confirm Delete Request"){
            DB::table('bus')
                ->where('bus_id', @$bus_id)
                ->update(['status' => 'd']);
            $buses= DB::select("SELECT * FROM bus where status='a' ");
            echo "<script type='text/javascript'>alert('successfully removed! ')</script>";
            return view('Operator',compact('buses'));
        }else if($request->Cancel=="Cancel"){
            $buses= DB::select("SELECT * FROM bus where status='a'");
            return view('Operator',compact('buses'));
        }
    }

    public function getschedule(){
        $busids = DB::select('select * from bus');//search route
        $places=DB::select('select * from town');
        return view('formAddschedule',compact('busids','places'));
    }
    public function insertschedule(Request $request){

        //   $busids = DB::select('select * from bus');//search route
        //   $places=DB::select('select * from town');

        $bus_id= (int)$request->busid;

        $atime=$request->atime;
        $dtime=$request->depttime;
        $town=$request->places;
        $townnames = DB::select("select * from town where town_name='$town' ");

        $places = DB::select("select * from bus  join route  on  bus.route_id=route.route_id where bus.bus_id='$bus_id' ");

        foreach($townnames as $townnames)
            $townid=$townnames->town_id;
        foreach($places as $places)
            $place1=$places->place1;
        $place2=$places->place2;
        if ($town==$place1 || $town==$place2) {

            $sql = "INSERT INTO schedule (bus_id,departure_time,arrival_time,departure_id) VALUES('$bus_id', '$dtime','$atime','$townid')";
            DB::connection()->getPdo()->exec($sql);

            echo "<script type='text/javascript'>alert('successfully added! ')</script>";

        }
        else{
            echo "<script type='text/javascript'>alert('Invalid Departure Place! ')</script>";
            $busids = DB::select('select * from bus');//search route
            $places=DB::select('select * from town');
            return view('formAddschedule',compact('busids','places'));
        }
        $buses= DB::select("SELECT * FROM bus where status='a'");
        return view('Operator',compact('buses'));
    }

    public function admin(){
        $users = DB::select('Select operator_id,company_name,status from busoperator');
        $routes= DB::select("SELECT * FROM route where status='a' ");
        return view('NTC',compact('users','routes'));
    }

    public function getAbout()
    {
        return view('about');

    }

    public function operator(){
        $buses= DB::select("SELECT * FROM bus where status='a'");
        $busSchedule=DB::select("SELECT bus.bus_id,bus.route_id,bus.fare,bus.bus_type,schedule.departure_time,schedule.arrival_time,town.town_name FROM bus,schedule,town where bus.bus_id=schedule.bus_id and schedule.departure_id=town.town_id and status='a'");
        return view('Operator',compact('buses','busSchedule'));
    }



}
