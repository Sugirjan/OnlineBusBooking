
@extends('forms')


@if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif
@if(Session::has('flash_message_delete'))
    <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_delete') !!}</em></div>
@endif




<h3>Update Route</h3>
<div>
    <?php


        foreach($result as $result)
            $route_id=$result->route_id;
            $place1=$result->place1;
            $place2=$result->place2;

    ?>

<form action="/updateroute" method="post">
        {{csrf_field()}}




    <div style="clear: both">
        <h4 style="float: left">Route ID</h4>
        <h4 style="float: right">{{$route_id}}</h4>
    </div>
    <hr />
        <input type="hidden" id="routeid" name="routeid"  value={{$route_id}}  >

        <label for="place1">Place 1</label>
        <select name="place1"  >
        <option selected>{{$place1}}</option>
        @foreach($towns as $town1)
            <option >
                {{$town1->town_name}}
            </option>
        @endforeach
    </select>


    <label for="place2">Place 2</label>

    <select name="place2"  >
        <option selected>{{$place2}}</option>
        @foreach($towns as $owns)
            <option >
                {{$owns->town_name}}
            </option>
        @endforeach
    </select>

    <input type="submit" name="Update" value="Update">
    <input type="submit" name="Cancel" value="Cancel">



</form>


</div>
