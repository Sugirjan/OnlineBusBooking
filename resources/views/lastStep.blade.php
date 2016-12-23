
@include('header')
<!-- banner -->
<div class="inside-banner">
    <div class="container">
        <span class="pull-right"><a href="#">Home</a> / Register</span>
        <h2>Register</h2>
    </div>
</div>
<!-- banner -->


<div class="container">
    <div class="spacer">
        <div class="row register">
            <div class="col-lg-4 col-lg-offset-1 col-sm-6 col-sm-offset-3 col-xs-12 ">


                <form action="/end" method="post">
                    {{csrf_field()}}

                    <div class="row">
                    <label for="fname">First Name</label>
                    <input type="text" id="owner"  name="fname" onkeypress="return lettersOnly(event)    " autofocus required>
                    </div>
                    <div class="row">
                    <label for="number">Contact Number</label>
                    <input type="number" id="arrival" name="number" size="10" required >
                    </div>
                    {{--<label for="seats">Seats</label>--}}
                    {{--<input type="number" id="departure" name="lseats" value={{$seats}} disabled="disabled">--}}
                        <div class="row">
                    <label for="amount">Amount</label>
                    <input  name="amount" value={{$totalFare}} >
                        </div>
                    {{--return view('lastStep',compact('schedule_id','dates','depar','arriv','bus_id','totalFare','seats'));--}}

                    <input type="hidden" name="schedule_id" value={{$schedule_id}} >
                    <input type="hidden" name="dates" value={{$dates}} >
                    <input type="hidden" name="depar" value={{$depar}}  >
                    <input type="hidden" name="arriv" value={{$arriv}}  >
                    <input type="hidden" name="bus_id" value={{$bus_id}} >
                    <input type="hidden" name="seats" value=<?php echo htmlentities(serialize($seats)); ?> >

                    <input class="btn-primary btn" type="submit"name="submit1" value="Submit">


                </form>

            </div>

        </div>
    </div>
</div>
@include('footer')



