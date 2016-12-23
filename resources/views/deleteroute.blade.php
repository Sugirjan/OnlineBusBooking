
@extends('forms')

<h3>Delete Route</h3>
<div>
    <?php


    foreach($result as $result)
        $route_id=$result->route_id;
        $place1=$result->place1;
        $place2=$result->place2;
        $status=$result->status;

    ?>

    <form action="/admin" method="post">
        {{csrf_field()}}

        <div style="clear: both">
            <h4 style="float: left">Route ID</h4>
            <h4 style="float: right">{{$route_id}}</h4>
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
        <input type="hidden" class="form-control" name="route_id" value="{{$route_id}}">
        <input type="submit" name="Confirm" value="Confirm Delete Request">
        <input type="submit" onclick="window.location.replace('/admin')" name="Cancel" value="Cancel">



    </form>


</div>