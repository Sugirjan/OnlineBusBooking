@extends('forms')
@if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif
@if(Session::has('flash_message_delete'))
    <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_delete') !!}</em></div>
@endif
<h3>Add New Schedule</h3>
<div>

    <form action="/addschedule" method="post">
        {{csrf_field()}}
                <!--  <label for="scheduleid">Bus ID</label>
        <input type="number" id="busid" name="busid" required>-->


        <label for="busid">Bus ID</label>
        <select name="busid"  >
            <!--<option selected disabled>Route ID</option>-->
            @foreach($busids as $busids)
                {{--<option value="{{$departure->route_id}}">--}}
                <option >
                    {{$busids->bus_id}}
                </option>
            @endforeach
        </select>

        <label for="comname">Departure Time</label>
        <input type="time" id="company" name="depttime"  required>


        <label for="fare">Arrival Time</label>
        <input type="time" id="type" name="atime" required>

        <label for="totals">Starting Place</label>
        <select name="places"  >
            <!--<option selected disabled>Route ID</option>-->
            @foreach($places as $places)
                {{--<option value="{{$departure->route_id}}">--}}
                <option >
                    {{$places->town_name}}
                </option>
            @endforeach
        </select>

        <input type="submit" value="Submit">
            <input type="submit" name="Cancel" onclick="window.location.replace('/operator')" value="Cancel And Go Back">

    </form>


</div>

