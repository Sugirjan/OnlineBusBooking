<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRouteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql2='CREATE TABLE Route (route_id INT NOT NULL PRIMARY KEY KEY,place1 VARCHAR(50) NOT NULL ,place2 VARCHAR(50) NOT NULL )';
        DB::connection()->getPdo()->exec($sql2);

        $sql1='CREATE TABLE bus ( bus_id INT NOT NULL PRIMARY KEY, route_id int not null , company_name VARCHAR(50) NOT NULL ,bus_type VARCHAR(10) NOT NULL ,fare INT NOT NULL ,total_seats INT NOT NULL , FOREIGN KEY(route_id) REFERENCES Route(route_id))';
        DB::connection()->getPdo()->exec($sql1);



        $sql3='CREATE TABLE Town (town_id INT NOT NULL ,town_name VARCHAR(50) NOT NULL )';
        DB::connection()->getPdo()->exec($sql3);

        $sql4='CREATE TABLE Schedule (schedule_id INT NOT NULL PRIMARY kEY AUTO_INCREMENT,bus_id INT NOT NULL,date_ DATE NOT NULL,departure_time TIME NOT NULL ,arrival_time TIME NOT NULL ,departure_id INT NOT NULL,FOREIGN KEY(bus_id) REFERENCES BUS(bus_id))';
        DB::connection()->getPdo()->exec($sql4);

        $sql5='CREATE TABLE Booking (booking_id INT NOT NULL PRIMARY KEY    ,schedule_id int not null ,name VARCHAR(50) NOT NULL ,gender VARCHAR(6) NOT NULL ,phone_no INT(10) NOT NULL ,fare INT NOT NULL ,FOREIGN KEY(schedule_id) REFERENCES Schedule(schedule_id))';
        DB::connection()->getPdo()->exec($sql5);

        $sql6='CREATE TABLE BusOperator (operator_id INT NOT NULL PRIMARY KEY,password VARCHAR(50) NOT NULL ,company_name VARCHAR(50) NOT NULL ,phone_no INT(10) NOT NULL ,fare INT NOT NULL )';
        DB::connection()->getPdo()->exec($sql6);

        $sql7='CREATE TABLE Booking_seat (booking_id int not null,seat INT NOT NULL ,FOREIGN KEY(booking_id) REFERENCES Booking(booking_id))';
        DB::connection()->getPdo()->exec($sql7);

        $sql8='CREATE TABLE OperatorBus (operator_id int not null, bus_id int not null, FOREIGN KEY(operator_id) REFERENCES BusOperator(operator_id), FOREIGN KEY(bus_id) REFERENCES Bus(bus_id))';
        DB::connection()->getPdo()->exec($sql8);

    }

    public function down()
    {
        $sql1='drop table Bus';
        DB::connection()->getPdo()->exec($sql1);

        $sql2='drop table Route';
        DB::connection()->getPdo()->exec($sql2);

        $sql3='drop table Town';
        DB::connection()->getPdo()->exec($sql3);

        $sql4='drop table Schedule';
        DB::connection()->getPdo()->exec($sql4);

        $sql5='drop table Busoperator';
        DB::connection()->getPdo()->exec($sql5);

        $sql6='drop table Operatorbus';
        DB::connection()->getPdo()->exec($sql6);

        $sql7='drop table Booking';
        DB::connection()->getPdo()->exec($sql7);

        $sql8='drop table Booking_seat';
        DB::connection()->getPdo()->exec($sql8);
    }
}
