

@extends('forms')






<body>

<h3>Add User</h3>

<div>
    <form action="/end" method="post">
            {{csrf_field()}}
        <label for="fname">First Name</label>
        <input type="text" id="owner"  name="fname" onkeypress="return lettersOnly(event)    " autofocus required>

        <label for="number">Contact Number</label>
        <input type="number" id="arrival" name="number" size="10" required >

       {{--<label for="seats">Seats</label>--}}
        {{--<input type="number" id="departure" name="lseats" value={{$seats}} disabled="disabled">--}}

        <label for="amount">Amount</label>
        <input  name="amount" value={{$totalFare}} >

        {{--return view('lastStep',compact('schedule_id','dates','depar','arriv','bus_id','totalFare','seats'));--}}

        <input type="hidden" name="schedule_id" value={{$schedule_id}} >
        <input type="hidden" name="dates" value={{$dates}} >
        <input type="hidden" name="depar" value={{$depar}}  >
        <input type="hidden" name="arriv" value={{$arriv}}  >
        <input type="hidden" name="bus_id" value={{$bus_id}} >
        <input type="hidden" name="seats" value=<?php echo htmlentities(serialize($seats)); ?> >

        <input type="submit"name="submit1" value="Submit">
    </form>

</div>

</body>
</html>

</body>
</html>
