@include('header')
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


        <input type="submit" value="Submit">
    </form>
    <script>
        function lettersOnly()
        {
            var charCode = event.keyCode;

            if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) || charCode == 8 ||charCode == 32)

                return true;
            else
                return false;
        }


    </script>
    <?php
 /*   $conn=mysqli_connect("localhost", "root", "ABIpiri99*");
    mysqli_select_db( $conn,"inspirabooking");

    // If the form has been submitted

    $bus_id=$_POST['busid'];
    $route_id=$_POST['routeid'];
    $company=$_POST['company'];
    $bus_type=$_POST['bustype'];
    $fare=$_POST['fare'];
    $total_seats=$_POST['tseats'];



    // Build an sql statment to add the route details
    $sql="INSERT INTO bus (bus_id,route_id,company_name,bus_type,fate,total_seats) VALUES('$bus_id',$route_id','$company','bus_type','fare')";
    $result = mysqli_query($conn,$sql);*/


    ?>
</div>
