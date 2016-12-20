@include('header')


<!-- banner -->
<div class="inside-banner">
    <div class="container">
        <span class="pull-right"><a href="index.php">Home</a> / Buses you can go</span>
        <h2>Buses you can go</h2>
    </div>
</div>
<!-- banner -->


<div class="container">
    <div class="properties-listing spacer">

        <div class="row">

            <div class="col-lg-5 col-sm-4 ">

                <div class="search-form"><h4><span class="glyphicon glyphicon-search"></span> Booking for {{$dep}} to {{$arr}} on {{$date}}</h4>
                </div>


            </div>

            <div class="col-lg-12 col-sm-8">
                <div class="row">
                    @foreach($places as $place)
                    <!-- properties -->
                    <div class="col-lg-12 col-sm-4">
                        <div class="properties">
                            <div class = "row">
                            <div class="col-lg-6">
                            <div class="image-holder"><img src="images/properties/1.jpg" class="img-responsive" alt="properties">
                                {{--<div class="status sold">Sold</div>--}}
                            </div>
                            </div>
                                <div class="col-lg-6">

                            <h3><a href="property-detail.php">{{$place->company_name}}</a></h3>
                            <p class="price">{{$place->bus_type}}</p>
                            <p class="price">{{$place->departure_time}}{{"   "}}  -{{"   "}}  {{$place->arrival_time}}</p>
                            <p class="price">total seats:  {{$place->total_seats}}  </p>
                                    <p class="price">Rs{{"   "}} {{$place->fare}}</p>

                                    <form action="/showSeats" method="post">
                            {{--<div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">5</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">1</span> </div>--}}
                                    <input  style="background-color: transparent ; border-style: hidden ;" type="hidden"   name="dep" value={{$dep}}>
                                    <input type="hidden" style="background-color: transparent ; border-style: hidden ;"   name="arr" value={{$arr}}>
                                    <input type="hidden" style="background-color: transparent ; border-style: hidden ;"   name="date" value={{$date}}>
                                        <input type="hidden" style="background-color: transparent ; border-style: hidden ;"   name="bus_id"  value={{$place->bus_id}}>
                                        <input type="hidden" style="background-color: transparent ; border-style: hidden ;"   name="fare"  value={{$place->fare}}>
                                        <input type="hidden" style="background-color: transparent ; border-style: hidden ;"   name="schedule_id"  value={{$place->schedule_id}}>
                                        {{csrf_field()}}
                                    <button class="btn btn-primary" type="submit" >Book now</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- properties -->
                    @endforeach

                    <div class="center">
                        <ul class="pagination">
                            <li><a href="#">«</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">»</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@include('footer')