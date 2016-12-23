
@extends('forms')



@if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif
@if(Session::has('flash_message_delete'))
    <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_delete') !!}</em></div>
@endif




<h3>Update Bus</h3>
<div>
    <?php

    foreach($result as $result)
        $bus_id=$result->bus_id;
    $routeid=$result->route_id;
    $company=$result->company_name;
    $bustype=$result->bus_type;
    $fare=$result->fare;
    $tseats=$result->total_seats;
    ?>

    <form action="/updatebus" method="post">
        {{csrf_field()}}




        <div style="clear: both">
            <h4 style="float: left">Bus ID</h4>
            <h4 style="float: right">{{$bus_id}}</h4>
        </div>
        <hr />
        <div style="clear: both">
            <h4 style="float: left">Bus Type</h4>
            <h4 style="float: right">{{$bustype}}</h4>
        </div>
        <hr />
        <div style="clear: both">
            <h4 style="float: left">Total Seats</h4>
            <h4 style="float: right">{{$tseats}}</h4>
        </div>
        <hr />
        <input type="hidden" id="routeid" name="busid"  value={{$bus_id}} onkeypress="return noletters(event)  >

        <label for="routeid">Route ID</label>
        <select name="routeid"  >
            <option selected>{{$routeid}}</option>
            @foreach($routes as $routes)

                <option>
                    {{$routes->route_id}}
                </option>
            @endforeach
        </select>


        <label for="fare">Fare</label>
        <input type="number" id="type" min="0" name="fare" value="{{$fare}}"required>




        <input type="submit" name="update" value="Update">
        <input type="submit"  name="cancel" value="Cancel">
        <?php
        //       var_dump($route_id) ?>
    </form>


</div>
