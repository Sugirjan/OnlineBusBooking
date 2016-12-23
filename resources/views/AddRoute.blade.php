
@extends('forms')


@if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif
@if(Session::has('flash_message_delete'))
    <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_delete') !!}</em></div>
@endif


<h3>Add Route</h3>
<div>
    <form action="/addroute" method="post">
        {{csrf_field()}}
        <label for="routeid">Route ID</label>
        <input type="number" id="routeid" min=1 name="routeid" autofocus required>



        <label for="place1">Place 1</label>
        <select name="place1"  >
            <!--<option selected disabled>Route ID</option>-->
            @foreach($towns as $town)
                {{--<option value="{{$departure->route_id}}">--}}
                <option>
                    {{$town->town_name}}
                </option>
            @endforeach
        </select>
     <!--   <input type="text" id="p1" name="place1" onkeypress="return lettersOnly(event)" required>-->


        <label for="place2">Place 2</label>
        <select name="place2"  >
            <!--<option selected disabled>Route ID</option>-->
            @foreach($towns as $town)
                {{--<option value="{{$departure->route_id}}">--}}
                <option >
                    {{$town->town_name}}
                </option>
            @endforeach

        </select>
      <!--  <input type="text" id="p2" name="place2" onkeypress="return lettersOnly(event)" required>-->


        <input type="submit" name="Submit" value="Submit">
        <input type="submit" onclick="window.location.replace('/admin')" name="Cancel" value="Cancel And Go Back">
    </form>


</div>
