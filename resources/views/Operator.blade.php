@include('header')

@extends('formSearch')
<body>
<!-- HTML for SEARCH BAR -->
<h3>Bus Control And Schedule Management</h3>
<div id="tfheader">

    <form id="tfnewsearch" action="/busdetails" method="post" >
        {{csrf_field()}}
        <input type="submit" name="addS" value="Add New Schedule" class="tfbutton" id="addbtn">
        <input type="submit" name="add" value="Add New Bus" class="tfbutton" id="addbtn">
        {{--<input type="text" class="tftextinput" name=busid size="21" maxlength="120">--}}
        <select class="tftextinput" name="busid"  >
            <!--<option selected disabled>Route ID</option>-->
            @foreach($buses as $bus)
                {{--<option value="{{$departure->route_id}}">--}}
                <option>
                    {{$bus->bus_id}}
                </option>
            @endforeach
        </select>
        <input type="submit" name="search" value="Update Bus" class="tfbutton">
        <input type="submit" name="delete" value="Remove Or View Bus Details" class="tfbutton">
    </form>
    <div class="tfclear"></div>
</div>
<p>
<h3>Bus AND Schedule Details</h3>
<table>
    <tr><td width="150px"><h3>Bus ID</h3></td><td><h3>Route ID</h3></td><td><h3>Departure Place</h3></td><td><h3>Departue Time</h3></td><td><h3>Arrival Time</h3></td><td><h3>Bus Type</h3></td><td><h3>Fare</h3></td> </tr>
    @foreach($busSchedule as $bs)

        <?php

        $bus_id=$bs->bus_id;
        $route_id=$bs->route_id;
        $Departure_place=$bs->town_name;
        $Departure_time=$bs->departure_time;
        $Arrival_time=$bs->arrival_time;
        $bus_type=$bs->bus_type;
        $fare=$bs->fare;
        ?>

       <td><h4><?php echo $bus_id ?></h4></td>
        <td><h4><?php echo $route_id ?></h4> </td>
            <td><h4><?php echo $Departure_place ?></h4> </td>
            <td><h4><?php echo $Departure_time ?></h4> </td>
            <td><h4><?php echo $Arrival_time ?></h4> </td>
            <td><h4><?php echo $bus_type ?></h4> </td>
            <td><h4><?php echo $fare ?></h4> </td>


            </tr>




    @endforeach


</table>

</body>









@extends('footer')