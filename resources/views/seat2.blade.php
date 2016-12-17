
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
    <title>Bus Ticket Reservation Widget Flat Responsive Widget Template :: w3layouts</title>
    <!-- for-mobile-apps -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Bus Ticket Reservation Widget Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <!-- //for-mobile-apps -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="seat2\css\jquery.seat-charts.css">
    <link href="seat2\css\style.css" rel="stylesheet" type="text/css" media="all" />
    <script src="seat2\js\jquery-1.11.0.min.js"></script>
    <script src="seat2\js\jquery.seat-charts.js"></script>
</head>
<body>
<div class="content">
    <form action="/selectSeatNo" onsubmit="return showarray()" method="post">
        {{csrf_field()}}
    <h1>Bus Ticket Reservation Widget</h1>
    <div class="main">
        <h2>Book Your Seat Now?</h2>
        <div class="wrapper">
            <div id="seat-map">
                <div class="front-indicator"><h3>Front</h3></div>
            </div>
            <div class="booking-details">
                <div id="legend"></div>
                <h3> Selected Seats (<span id="counter">0</span>):</h3>
                <ul id="selected-seats" class="scrollbar scrollbar1"></ul>
                Total: <b>$<span id="total">0</span></b>
                <input type="button" button class="checkout-button">
            </div>
            <div class="clear"></div>
        </div>


        <?php
            $data=array($arr,$tot_seat);

        ?>

        <script>
            var firstSeatLabel = 1;
            var arra=[];
            var ar=  <?php echo json_encode($data)?>;

            len=ar[0].length;

            var y=[];
            var tot =parseInt(ar[1]);

            for (i=0;i<len;i++){
                var d=0;
                var a=parseInt(ar[0][i]);

                var initia=a;
                var count=1;


                if(a<3){
                    d=a
                }
                else if(a<=5){
                    d=a+1;
                }
                else if(a>5) {
                    while(a>5) {
                        count = count + 1;
                        a = a - 5;
                    }
                    if(initia>=tot-3){

                        d=a

                    }

                    else if(a<3){
                        d=a
                    }

                    else if(a<=5){
                        d=a+1;
                    }
                }
                var b=count;
                if(initia==tot){
                    d=6;
                    b=count-1;


                }
                var x=b+"_"+d;
                y.push(x);

            }
            $(document).ready(function() {
                var $cart = $('#selected-seats'),
                        $counter = $('#counter'),
                        $total = $('#total'),
                        sc = $('#seat-map').seatCharts({
                            map: [
                                'ff_eee',
                                'ff_eee',
                                'ff_eee',
                                'ff_eee',
                                'ff_eee',
                                'ff_eee',
                                'ee_eee',
                                'ee_eee',
                                'eeeeee',
                            ],
                            seats: {
                                f: {
                                    price   : 100,
                                    classes : 'first-class', //your custom CSS class
                                    category: 'Booked'
                                },
                                e: {
                                    price   : 40,
                                    classes : 'economy-class', //your custom CSS class
                                    category: 'Booked'
                                }

                            },
                            naming : {
                                top : false,
                                getLabel : function (character, row, column) {
                                    return firstSeatLabel++;
                                },
                            },
                            legend : {
                                node : $('#legend'),
                                items : [
                                    [ 'f', 'available',   'Male' ],
                                    [ 'e', 'available',   'Female'],
                                    [ 'f', 'unavailable', 'Already Booked']
                                ]
                            },
                            click: function () {
                                if (this.status() == 'available') {
                                    //let's create a new <li> which we'll add to the cart items
                                    $('<li>'+this.data().category+' : Seat no '+this.settings.label+': <b>$'+this.data().price+'</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
                                            .attr('id', 'cart-item-'+this.settings.id)
                                            .data('seatId', this.settings.id)
                                            .appendTo($cart);
                                    arra.push(this.settings.label);


                                    /*
                                     * Lets update the counter and total
                                     *
                                     * .find function will not find the current seat, because it will change its stauts only after return
                                     * 'selected'. This is why we have to add 1 to the length and the current seat price to the total.
                                     */
                                    $counter.text(sc.find('selected').length+1);
                                    $total.text(recalculateTotal(sc)+this.data().price);

                                    return 'selected';
                                } else if (this.status() == 'selected') {
                                    //update the counter
                                    $counter.text(sc.find('selected').length-1);
                                    //and total
                                    $total.text(recalculateTotal(sc)-this.data().price);

                                    //remove the item from our cart
                                    $('#cart-item-'+this.settings.id).remove();

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
            function showarray() {

               alert(arra);

            }

            $url = 'seat2.php';

            $.get($url, {name: get_name(), job: get_job()});


//           JSON.stringify(arra);
//            alert(arra);
//            function getData()
//            {
//                var agree=confirm("showarray?");
//                if (agree)
//                {
//                    document.getElementById('javascriptOutPut').value = showarray();
//                    return true;
//                }
//                else
//                {
//                    return false;
//                }
//            }



        </script>
        <?php
        $con="<script> document.write(arra)</script>";
        var_dump($con);
        ?>
    </div>
    <p class="copy_rights">&copy; 2016 Bus Ticket Reservation Widget. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank"> W3layouts</a></p>
</form>
</div>
<script src="seat2\js\jquery.nicescroll.js"></script>
<script src="seat2\js\scripts.js"></script>
</body>
</html>
