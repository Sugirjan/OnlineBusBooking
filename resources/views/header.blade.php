<!DOCTYPE html>
<html lang="en">
<head>
    <title>Online bus Booking </title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>


    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src={{URL::asset('bootstrap\js\bootstrap.js')}}></script>
    <script src={{URL::asset('script.js')}}></script>
    <link rel="stylesheet" href="{{URL::asset('bootstrap\css\bootstrap.css')}}">
    <link rel="stylesheet" href="{{URL::asset('style.css')}}">

    <!-- Owl stylesheet -->
    <link rel="stylesheet" href="{{URL::asset('owl-carousel\owl.carousel.css')}}">
    <link rel="stylesheet" href="{{URL::asset('owl-carousel\owl.theme.css')}}">
    <script src={{URL::asset('owl-carousel\owl.carousel.js')}}></script>
    <!-- Owl stylesheet -->


    <!-- slitslider -->
    <link rel="stylesheet" type="text/css" href={{URL::asset('slitslider\css\style.css')}} />
    <link rel="stylesheet" type="text/css" href={{URL::asset('slitslider\css\custom.css')}} />
    <script type="text/javascript" src={{URL::asset('slitslider\js\modernizr.custom.79639.js')}}></script>
    <script type="text/javascript" src={{URL::asset('slitslider\js\jquery.ba-cond.min.js')}}></script>
    <script type="text/javascript" src={{URL::asset('slitslider\js\jquery.slitslider.js')}}></script>
    <!-- slitslider -->

</head>

<body>


<!-- Header Starts -->
<div class="navbar-wrapper">

    <div class="navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">


                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>


            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>          <!--This for links-->
                </ul>
            </div>
            <!-- #Nav Ends -->

        </div>
    </div>

</div>
<!-- #Header Starts -->





<div class="container">

    <!-- Header Starts -->
    <div class="header">
        <a href="welcome.blade.php"><img src="images/logo.png" alt="Realestate"></a>

        {{--<ul class="pull-right">--}}
            {{--<li><a href="buysalerent.php">Buy</a></li>--}}
            {{--<li><a href="buysalerent.php">Sale</a></li>--}}
            {{--<li><a href="buysalerent.php">Rent</a></li>--}}
        {{--</ul>--}}
    </div>
    <!-- #Header Starts -->
</div>