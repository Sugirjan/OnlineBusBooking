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

    <!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

    <!--Font Awesome (added because you use icons in your prepend/append)-->
    <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

    <!-- Inline CSS based on choices in "Settings" tab -->
    <style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>

    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

    <script>
        $(document).ready(function(){
            var date=$('input[name="date"]'); //our date input has the name "date"
            var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";

          //  var dates = new Date(arr[2]+"-"+arr[1]+"-"+arr[0]);
//            var d = dates.getDate();
//            var m = dates.getMonth();
//            var y = dates.getFullYear();
           // var minDate = new Date(y, m+1, d);
//            $("#EndDate").datepicker('setDate', minDate);

            date.datepicker({
                format: 'yyyy-mm-dd',
                orientation:'top left',
                startDate:new Date(),
                container: container,
                todayHighlight: true,
                autoclose: true,
            })
        })
    </script>

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
            <a class="navbar-brand"><img src="images/logo.png" height="35px" class="imag-responsive img-circle"></a>
            </div>


            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="/about">About</a></li>          <!--This for links-->
                </ul>
            </div>
            <!-- #Nav Ends -->

        </div>
    </div>

</div>
<!-- #Header Starts -->





{{--<div class="container">--}}

    {{--<!-- Header Starts -->--}}
    {{--<div class="header">--}}
        {{--<a href="welcome.blade.php"><img src="images/logo.png" alt="Realestate"><h2></h2></a>--}}

        {{----}}
    {{--</div>--}}
    {{--<!-- #Header Starts -->--}}
{{--</div>--}}