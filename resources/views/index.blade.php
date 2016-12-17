@include('header')

<div class="">


            <div id="slider" class="sl-slider-wrapper">

        <div class="sl-slider">

          <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-1"> </div>

              <h2><a href="#">Reserve bus seats in long distance buses across Sri Lanka</a></h2>
              <blockquote>
              <p> Reserve your seats from anywhere at anytime by simply log into internet with your favorite device.</p>
              <p>Fully Fledged Booking and Reservation Services for Public Transport Services.</p>              
              </blockquote>
            </div>
          </div>

          <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-2"></div>
              <h2><a href="#">Reserve bus seats in long distance buses across Sri Lanka</a></h2>
              <blockquote>
              <p> Save your valuable time and money by making advanced booking via our website.</p>
              <p>Fully Fledged Booking and Reservation Services for Public Transport Services.</p>              
              </blockquote>
            </div>
          </div>

          <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-3"></div>
              <h2><a href="#">Reserve bus seats in long distance buses across Sri Lanka</a></h2>
              <blockquote>
              <p>Pay online securely via the internet payment gateways provided by leading financial institutions.</p>
              <p>Fully Fledged Booking and Reservation Services for Public Transport Services.</p>              
              </blockquote>
            </div>
          </div>

          <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="-5" data-slice2-rotation="25" data-slice1-scale="2" data-slice2-scale="1">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-4"></div>
              <h2><a href="#">Reserve bus seats in long distance buses across Sri Lanka</a></h2>
              <blockquote>
              <p> Experience next generation passenger service with our well experienced passenger services executives.</p>
              <p>Fully Fledged Booking and Reservation Services for Public Transport Services.</p>              
              </blockquote>
            </div>
          </div>

          <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-5"></div>
              <h2><a href="#">Reserve bus seats in long distance buses across    Sri Lanka</a></h2>
              <blockquote>
              <p>Enjoy all our offers by registering to our services.</p>
              <p>Fully Fledged Booking and Reservation Services for Public Transport Services.</p>        
              </blockquote>
            </div>
          </div>
        </div><!-- /sl-slider -->



        <nav id="nav-dots" class="nav-dots">
          <span class="nav-dot-current"></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </nav>

      </div><!-- /slider-wrapper -->
</div>



<div class="banner-search">
  <div class="container">
    <!-- banner -->
    <h3>Reserve Now</h3>
    <div class="searchbar">
      <div class="row">
        <div class="col-lg-6 col-sm-6">
          {{--<input type="text" class="form-control" placeholder="Search of Properties">--}}
          <div class="row">

            <form action="/timetable" method="post">
              {{ csrf_field() }}
            <div class="col-lg-4 col-sm-4 ">
              <select name="departure" class="form-control form-group" >
                <option selected disabled>Departure place</option>
                @foreach($routes as $departure)
                  {{--<option value="{{$departure->route_id}}">--}}
                        <option>
                    {{$departure->place1}}
                  </option>
                @endforeach
              </select>
            </div>
            <div class="col-lg-4 col-sm-4">
              <select name="arrival" class="form-control" id="arr">
                  <option selected disabled>Arrival place</option>
                  @foreach($routes as $arrival)
                    {{--<option value="{{$arrival->route_id}}">--}}
                      <option>
                      {{$arrival->place2}}
                    </option>
                    @endforeach
              </select>
            </div>

            <div class="input-group col-lg-4 col-sm-4">
              <div class="input-group-addon">
                <i class="fa fa-calendar-check-o">
                </i>
              </div>
              <input class="form-control" id="date" name="date" placeholder="Choose a date" type="text"/>
            </div>

            {{--<div class="">--}}
              <div class="col-lg-4 col-lg-offset-4 col-sm-4">
                <button class="btn btn-success" type="submit">Search Now</button>
              </div>
            {{--</div>--}}

            </form>


          </div>
        </div>

        <div class="col-lg-5 col-lg-offset-1 col-sm-6 ">
          <p>Join now and get updated with details and enjoy our offers.</p>
          <button class="btn btn-info"  data-toggle="modal" data-target="#loginpop">Login</button>        </div>
      </div>
    </div>
  </div>
</div>

<!-- banner -->
<div class="container">
  <div class="properties-listing spacer"> <a href="buysalerent.php" class="pull-right viewall">View All Listing</a>
    <h2>Top Bus Routes And Bus Schedules</h2>
    <div id="owl-example" class="owl-carousel">
      <div class="properties">
        <div class="image-holder"><img src={{URL::asset('images/properties/1.jpg')}} class="img-responsive" alt="properties"/>          
        </div>
        <h4><a href="property-detail.php">Wellawatta - Jaffna</a></h4>
        <p>From Wellawatta: 07.00 PM (Super Luxury)</p>
        <p>From Jaffna: 07.15 PM (Super Luxury)</p>       
        <a class="btn btn-primary" href="property-detail.php">View Details</a>
      </div>

      <div class="properties">
        <div class="image-holder"><img src={{URL::asset('images/properties/2.jpg')}} class="img-responsive" alt="properties"/>          
        </div>
        <h4><a href="property-detail.php">Colombo - Kataragama</a></h4>        
        <p>From Colombo: 06.30 AM (Super Luxury)</p>
        <p>From Kataragama: 03.15 PM (Super Luxury)</p>
        <a class="btn btn-primary" href="property-detail.php">View Details</a>
      </div>
      <div class="properties">
        <div class="image-holder"><img src={{URL::asset('images/properties/3.jpg')}} class="img-responsive" alt="properties"/>          
        </div>
        <h4><a href="property-detail.php">Colombo - Kandy</a></h4>        
        <p>From Colombo: 04.30 AM (Super Luxury)</p>
        <p>From Kandy: 04.15 PM (Super Luxury)</p>
        <a class="btn btn-primary" href="property-detail.php">View Details</a>
      </div>
      <div class="properties">
        <div class="image-holder"><img src={{URL::asset('images/properties/5.jpg')}} class="img-responsive" alt="properties"/>          
        </div>
        <h4><a href="property-detail.php">Colombo - Galle</a></h4>        
        <p>From Colombo: 06.30 AM (Normal)</p>
        <p>From Galle: 07.15 AM (Normal)</p>
        <a class="btn btn-primary" href="property-detail.php">View Details</a>
      </div>

      <div class="properties">
        <div class="image-holder"><img src={{URL::asset('images/properties/4.jpg')}} class="img-responsive" alt="properties"/></div>
        <h4><a href="property-detail.php">Colombo - Batticaloa</a></h4>
        <p>From Colombo: 08.30 pM (Super Luxury)</p>
        <p>From Batticaloa: 08.00 PM (Super Luxury)</p>       
        <a class="btn btn-primary" href="property-detail.php">View Details</a>
      </div>

    </div>
  </div>

  <div class="spacer">
    <div class="row">
      <div class="col-lg-6 col-sm-9 recent-view">
        <h3>About Us</h3>
        <p>InSpia is a startup of undergrads from Department of CSE, Faculty of Engineering, University of Moratuwa trying to make waves in software world.<br><a href="about.php">Learn More</a></p>

      </div>
     
    </div>
  </div>
</div>


@extends('footer')
