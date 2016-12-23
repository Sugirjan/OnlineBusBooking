@include('header')

@extends('formSearch')
<body>

<h2>Admin Panel</h2>

<h3>Routes And Town Stop Management</h3>
<div id="tfheader">

    <form id="tfnewsearch" action="/" method="post" >
        {{csrf_field()}}
        <input type="submit" value="Add New Town" name="ADDT" class="tfbutton">
        <input type="submit" value="Add New Route" name="ADDR" class="tfbutton">
        <font size="4">Select The Route You Want To Update or Delete</font>
        <select class="tftextinput" name="routeid"  >
            <!--<option selected disabled>Route ID</option>-->
            @foreach($routes as $route)
                {{--<option value="{{$departure->route_id}}">--}}
                <option>
                    {{$route->route_id}}
                </option>
            @endforeach
        </select>
        <input type="submit"  name="search" value="Update Route"  class="tfbutton">
        <input class="tfbutton"  type="submit" name="delete" value="Delete Route">
    </form>
    <div class="tfclear"></div>
</div>


<p>
<h3>Bus Operator Management</h3>
    <table>
    <tr><td width="150px"><h3>Users</h3></td><td><h3>Options</h3></td> </tr>


    @foreach($users as $users)
        <form class="" role="form" action="/activate" method="post">
<!--            --><?php

                $u_name=$users->company_name;
                $u_status=$users->status;
           ?>
            <input type="hidden" class="form-control" name="u_id" value="{{$users->operator_id}}">
            <input type="hidden" class="form-control" name="u_status" value="{{$users->status}}">
            <tr><td><h4><?php echo $u_name ?></h4></td>

            @if ($u_status=="a")
                    {{csrf_field()}}
                    <td> <button type="submit" class="btn btn-success">Deactivate</button></td></tr>

            @else
                    {{csrf_field()}}
                    <td><button type="submit" class="btn btn-success">Activate</button></td></tr>
            @endif


        </form>
    @endforeach


    </table>





</body>





@extends('footer')