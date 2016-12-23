
    @extends('forms')

    <h3>Remove Bus Request</h3>
    <div>
        <?php
            foreach ($routes1 as $route1){
                $place1=$route1->place1;
                $place2=$route1->place2;}
        foreach($result as $result){
            $bus_id=$result->bus_id;
        $routeid=$result->route_id;
        $company=$result->company_name;
        $bustype=$result->bus_type;
        $fare=$result->fare;
        $tseats=$result->total_seats;
        }
        ?>

        <form action="/deletebus" method="post">
            {{csrf_field()}}

            <input type="hidden" id="bus_id" name="bus_id"  value="{{$bus_id}}">
            <div style="clear: both">
                <h4 style="float: left">Bus ID</h4>
                <h4 style="float: right">{{$bus_id}}</h4>
            </div>
            <hr />

            <div style="clear: both">
                <h4 style="float: left">Route ID</h4>
                <h4 style="float: right">{{$routeid}}</h4>
            </div>
            <hr />
            <div style="clear: both">
                <h4 style="float: left">Place 1</h4>
                <h4 style="float: right">{{$place1}}</h4>
            </div>
            <hr />
            <div style="clear: both">
                <h4 style="float: left">Place2</h4>
                <h4 style="float: right">{{$place2}}</h4>
            </div>
            <hr />
            <div style="clear: both">
                <h4 style="float: left">Bus Type</h4>
                <h4 style="float: right">{{$bustype}}</h4>
            </div>
            <hr />


            <input type="submit" name="Confirm" value="Confirm Delete Request">
            <input type="submit" name="Cancel" value="Cancel">
        </form>


    </div>
