<?php
/**
 * Created by PhpStorm.
 * User: PIRAVEENA
 * Date: 12/19/2016
 * Time: 12:15 AM
 */



$con = mysqli_connect("localhost", "root", "ABIpiri99*");
if (!$con) {
    die('Could not connect: ' . mysqli_error());
}
mysqli_select_db("inspirabooking", $con);

