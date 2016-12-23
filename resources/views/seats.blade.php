<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
@include('header')
        <!DOCTYPE html>
<html>
<head>
    <title>Bus Ticket Reservation Widget Flat Responsive Widget Template :: w3layouts</title>
    <!-- for-mobile-apps -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords"
          content="Bus Ticket Reservation Widget Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>
    <!-- //for-mobile-apps -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
          rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'
          rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="seat2\css\jquery.seat-charts.css">
    <link href="seat2\css\style.css" rel="stylesheet" type="text/css" media="all"/>
    <script src="seat2\js\jquery-1.11.0.min.js"></script>
    <script src="seat2\js\jquery.seat-charts.js"></script>
</head>
<body>
<div class="content">
    <div class="main">
        <form action="/" onsubmit="return showarray()" method="post">
            {{--{{csrf_field()}}--}}
            <h1>Bus Ticket Reservation </h1>

            <h2>Book Your Seat Now?</h2>
            <div class="wrapper">
                <div id="seat-map">
                    <div class="front-indicator"><h3>Front</h3></div>
                </div>
                <div class="booking-details">
                    <div id="legend"></div>
                    <h3> Selected Seats (<span id="counter">0</span>):</h3>
                    <ul id="selected-seats" class="scrollbar scrollbar1"></ul>
                    Total: <b>Rs<span id="total">0</span></b>
                    <input type="hidden" style="background-color: transparent ; border-style: hidden ;" name="depar"
                           value=$depar>
                    <input type="hidden" style="background-color: transparent ; border-style: hidden ;" name="arriv"
                           value=$arriv>
                    <input type="hidden" style="background-color: transparent ; border-style: hidden ;" name="dates"
                           value=$dates>
                    <input type="hidden" style="background-color: transparent ; border-style: hidden ;" name="bus_id"
                           value=bus_id>
                    <input type="hidden" style="background-color: transparent ; border-style: hidden ;" name="fare"
                           value=fare>
                    <input type="hidden" style="background-color: transparent ; border-style: hidden ;"
                           name="schedule_id" value=schedule_id>
                    <input type="hidden" style="background-color: transparent ; border-style: hidden ;" name="seats"
                           id="seats">
                    <input type="button" value="submit" class="checkout-button" id="seatNoButtonSubmit">

                </div>
                <div class="clear"></div>
            </div>
        </form>
    </div>
    <?php
    $data = array($arr, $tot_seat, $depar, $arriv, $dates, $bus_id, $fare, $schedule_id);
    $extra = array($depar, $arriv, $dates, $bus_id, $fare, $schedule_id);
    ?>

    <script>
        var firstSeatLabel = 1;
        var arra = [];
        var ar =  <?php echo json_encode($data)?>;
        var extra =  <?php echo json_encode($extra)?>;

        len = ar[0].length;


        var y = [];
        var tot = parseInt(ar[1]);
        // arra.push(tot);

        for (i = 0; i < len; i++) {
            var d = 0;
            var a = parseInt(ar[0][i]);
            var initia = a;
            var count = 1;

            if (a < 3) {
                d = a
            }
            else if (a <= 5) {
                d = a + 1;
            }
            else if (a > 5) {
                while (a > 5) {
                    count = count + 1;
                    a = a - 5;
                }
                if (initia >= tot - 3) {
                    d = a
                }

                else if (a < 3) {
                    d = a
                }

                else if (a <= 5) {
                    d = a + 1;
                }
            }
            var b = count;
            if (initia == tot) {
                d = 6;
                b = count - 1;
            }
            var x = b + "_" + d;
            y.push(x);

        }
        $(document).ready(function () {
            var $cart = $('#selected-seats'),
                $counter = $('#counter'),
                $total = $('#total'),
                sc = $('#seat-map').seatCharts({
                    map: [
                        'ee_eee',
                        'ee_eee',
                        'ee_eee',
                        'ee_eee',
                        'ee_eee',
                        'ee_eee',
                        'ee_eee',
                        'ee_eee',
                        'eeeeee',
                    ],
                    seats: {
                        f: {
                            price: 100,
                            classes: 'first-class', //your custom CSS class
                            category: 'Booked'
                        },
                        e: {
                            price: parseInt(ar[6]) ,
                            classes: 'economy-class', //your custom CSS class
                            category: 'Booked'
                        }
                    },
                    naming: {
                        top: false,
                        getLabel: function (character, row, column) {
                            return firstSeatLabel++;
                        },
                    },
                    legend: {
                        node: $('#legend'),
                        items: [

                            ['e', 'available', 'Available'],
                            ['f', 'unavailable', 'Already Booked']
                        ]
                    },
                    click: function () {
                        console.log(arra);

                        if (this.status() == 'available') {
                            //let's create a new <li> which we'll add to the cart items
                            $('<li>' + this.data().category + ' : Seat no ' + this.settings.label + ': <b>Rs' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
                                .attr('id', 'cart-item-' + this.settings.id)
                                .data('seatId', this.settings.id)
                                .appendTo($cart);
                            arra.push(this.settings.label);
                            /*
                             * Lets update the counter and total
                             *
                             * .find function will not find the current seat, because it will change its stauts only after return
                             * 'selected'. This is why we have to add 1 to the length and the current seat price to the total.
                             */
                            $counter.text(sc.find('selected').length + 1);
                            $total.text(recalculateTotal(sc) + this.data().price);

                            return 'selected';
                        } else if (this.status() == 'selected') {
                            //update the counter
                            $counter.text(sc.find('selected').length - 1);
                            //and total
                            $total.text(recalculateTotal(sc) - this.data().price);

                            //remove the item from our cart
                            $('#cart-item-' + this.settings.id).remove();

                            //seat has been vacated
                            return 'available';
                        } else if (this.status() == 'unavailable') {
                            //seat has been already booked
                            return 'unavailable';
                        } else {
                            return this.style();
                        }
                    }
                });

            //this will handle "[cancel]" link clicks
            $('#selected-seats').on('click', '.cancel-cart-item', function () {
                //let's just trigger Click event on the appropriate seat, so we don't have to repeat the logic here
                sc.get($(this).parents('li:first').data('seatId')).click();
            });

            //let's pretend some seats have already been booked
            sc.get(y).status('unavailable');

        });

        function recalculateTotal(sc) {
            var total = 0;

            //basically find every selected seat and sum its price
            sc.find('selected').each(function () {
                total += this.data().price;
            });

            return total;

        }
        var datas = {bookedSeats:arra,next:extra}
        //var dta = $.serialize(datas);

        $(document).ready(function (){ $('#seatNoButtonSubmit').click(function () {
            $('#seats').value = arra;
            $('.main').remove();
            $('.content').append(
                '\
             <form  class = "form-group form-horizontal " style="background-color: #d9d9d9" action="/end" method="post">{{csrf_field()}}\
                <div class="col-lg-6">\
                <div class="col-lg-6">\
                <div class="container-fluid">\
                  <div class="row">\
                <label for="fname">First Name</label>\
            <input type="text " class="col-md-offset-1" id="owner"  name="fname" style="" onkeypress="return lettersOnly(event)" autofocus required>\
            </div>\
            \
            <div class="row">\
               \
                <label for="number">Contact Number</label>\
            <input type="number" id="arrival" name="number" size="10" required >\
            </div>\
            \
            <div class="row">\
                \
            <label for="amount">Amount</label>\
            \
         \
            <input class="col-md-offset-2" name="amount" style="background-color: transparent; border-style: hidden" value='+datas["next"][4]*(datas["bookedSeats"].length)+' >\
            </div>\
            <div class="row"> \
            <label for="amount">Booked Seats</label> \
            <input   name="seats"  style="background-color: transparent; border-style: hidden" value='+JSON.stringify(datas["bookedSeats"])+'>\
            </div>\
            <div class="row">\
             <input name = "submit" class = "btn btn-primary" style="background-color: #980303" type="submit" value = "Submit"></button>\
             </div>\
             <div class="row">\
             </div>\
             <div class="row">\
              <input name = "submit" class = "btn-primary btn" style="background-color: #0076a3" type="submit" value = "Cancel"></button>\
            <div>\
            <input  type="hidden"  name="schedule_id" value='+datas["next"][5]+' >\
           \
    <input  type="hidden" name="depar" value='+datas["next"][0]+'  >\
<input  name="arriv" type="hidden" value='+datas["next"][1]+'  >\
<input  name="bus_id" type="hidden" value='+datas["next"][3]+' >\
<input  name="dates" type="hidden" value='+datas["next"][2]+' >\
\
            </form>'
            );
        })});
    </script>
    <?php
    $con = "<script> document.write(arra)</script>";
    //var_dump($con);
    ?>


</div>
<script src="seat2\js\jquery.nicescroll.js"></script>
<script src="seat2\js\scripts.js"></script>

@includes('footer');

{{--@include('forms')--}}

{{--<div>--}}
{{--<form action="/booking2" method="post">--}}
{{--{{csrf_field()}}--}}
{{--<div  style="background-color: #4cae4c;">--}}
{{--<div class="form-group  form-control col-lg-6" >--}}
{{--<h3>Contact details</h3>--}}
{{--<label for="fname">First Name</label>--}}
{{--<input type="text" id="owner"  name="fname" onkeypress="return lettersOnly(event)    " autofocus required>--}}

{{--<div class="row">--}}
{{--<label for="number">Contact Number</label>--}}
{{--<input type="number" id="arrival" name="number" size="10" required >--}}
{{--</div>--}}

{{--<div class="row">--}}
{{--<label for="seats">Seats</label>--}}
{{--<input type="number" id="departure" name="lseats" disabled="disabled">--}}
{{--</div>--}}

{{--<div class="row">--}}
{{--<label for="amount">Amount</label>--}}
{{--<input type="number" id="fare" name="amount" disabled="disabled">--}}
{{--</div>--}}

{{--<input type="submit"name="submit1" value="Submit">--}}
{{--</div>--}}
{{--</div>--}}
{{--</form>--}}

{{--</div>--}}


</body>

</html>





{{--<label for="fname">First Name</label>\--}}
{{--<input type="text" id="owner"  name="fname" onkeypress="return lettersOnly(event)    " autofocus required>\--}}
{{--\--}}
{{--<label for="number">Contact Number</label>\--}}
{{--<input type="number" id="arrival" name="number" size="10" required >\--}}
{{--\--}}
{{--<label for="seats">Seats</label>\--}}
{{--<input type="number" id="departure" name="lseats" disabled="disabled">\--}}
{{--\--}}

{{--<label for="amount">Amount</label> \--}}
{{--<input type="submit" style="position: absolute; left: -9999px"/>--}}

{{--<div class = col-md-12>\--}}
{{--<div class="col-md-5">\--}}
{{--<form  class = "form-group form-horizontal form-control-static" style="background-color: #d9d9d9" action="/payment" method="post">{{csrf_field()}}\--}}
{{--<div>\--}}
{{--<div class="row ">\--}}
{{--<div class="col-md-10">\--}}
{{--<label for="fname">First Name</label>\--}}
{{--<input type="text " class="col-md-offset-1" id="owner"  name="fname" style="" onkeypress="return lettersOnly(event)" autofocus required>\--}}
{{--</div>\--}}
{{--</div>\--}}
{{--<div class="row">\--}}
{{--<div class="col-lg-10">\--}}
{{--<label for="number">Contact Number</label>\--}}
{{--<input type="number" id="arrival" name="number" size="10" required >\--}}
{{--</div>\--}}
{{--</div>\--}}
{{--<div class="row">\--}}
{{--<div class= col-lg-10>\--}}
{{--<label for="amount">Amount</label>\--}}
{{--<input class="col-md-offset-2" name="amount" value='+datas["next"][4]*(datas["bookedSeats"].length)+' >\--}}
{{--</div>\--}}
{{--</div>\--}}
{{--</div>\--}}
{{--</div>\--}}
{{--</div>\--}}


{{--<input type="hidden"  name="schedule_id" value='+datas["next"][5]+' >\--}}
{{--<input  type="hidden" name="depar" value='+datas["next"][0]+'  >\--}}
{{--<input  name="arriv" type="hidden" value='+datas["next"][1]+'  >\--}}
{{--<input  name="bus_id" type="hidden" value='+datas["next"][3]+' >\--}}
{{--<input  name="dates" type="hidden" value='+datas["next"][2]+' >\--}}
{{--<input   name="seats" type="hidden" value='+JSON.stringify(datas["bookedSeats"])+'>\--}}
{{--<div class="col-md-1">\--}}
{{--<input class= col-md-2" type="submit"></form>\--}}
{{--</div>\--}}

