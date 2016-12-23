@extends('forms')
@if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif
@if(Session::has('flash_message_delete'))
    <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_delete') !!}</em></div>
@endif
<h3>Add New Bus</h3>
<div>

    <form action="/addnewbus" method="post">
        {{csrf_field()}}
        <label for="busid">Bus ID</label>
        <input type="number" id="busid" name="busid" required>


        <label for="routeid">Route ID</label>
        <select name="routeid"  >
            <!--<option selected disabled>Route ID</option>-->
            @foreach($routes as $routes)
                {{--<option value="{{$departure->route_id}}">--}}
                <option>
                    {{$routes->route_id}}
                </option>
            @endforeach
        </select>

        <label for="comname">Company</label>
        <input type="text" id="company" name="company"  onkeypress="return lettersOnly(event)" required>


        <label for="btname">Bus Type</label>
        <select class="stations form-control" name="bustype" id="to" required="required">
            <option value="normal">Normal</option>
            <option value="semi">Semi-Luxary</option>
            <option value="lux">Luxary</option>
        </select>

        <label for="fare">Fare</label>
        <input type="number" id="type" name="fare" required>

        <label for="totals">Total Seats</label>
        <input type="number" id="type" name="tseats" required>


        <input type="submit" name="submit" value="Submit">
        <input type="submit" onclick="window.location.replace('/operator')" name="cancel" value="Cancel">
    </form>


</div>

