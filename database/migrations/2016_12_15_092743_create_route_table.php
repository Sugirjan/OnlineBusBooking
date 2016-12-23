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


        $sql2 = 'CREATE TABLE Route (route_id INT NOT NULL PRIMARY KEY ,place1 VARCHAR(50) NOT NULL ,place2 VARCHAR(50) NOT NULL, status VARCHAR(1) not null)';
        DB::connection()->getPdo()->exec($sql2);

        $sql1 = 'CREATE TABLE bus(
        bus_id INT NOT NULL PRIMARY KEY,
  route_id INT NOT NULL,
  company_name VARCHAR(50) NOT NULL,
  bus_type VARCHAR(10) NOT NULL,
  fare INT NOT NULL,
  total_seats INT NOT NULL,
  STATUS VARCHAR(1) NOT NULL,
  FOREIGN KEY(route_id) REFERENCES Route(route_id)
  ON DELETE CASCADE ON UPDATE CASCADE
)';

        DB::connection()->getPdo()->exec($sql1);

        $sql3 = 'CREATE TABLE Town (town_id INT NOT NULL PRIMARY KEY ,town_name VARCHAR(50) NOT NULL )';
        DB::connection()->getPdo()->exec($sql3);

        $sql4 = 'CREATE TABLE SCHEDULE(
  schedule_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  bus_id INT NOT NULL,
  date_ DATE NOT NULL,
  departure_time TIME NOT NULL,
  arrival_time TIME NOT NULL,
  departure_id INT NOT NULL,
  FOREIGN KEY(bus_id) REFERENCES BUS(bus_id)
    ON DELETE CASCADE ON UPDATE CASCADE
);
';
        DB::connection()->getPdo()->exec($sql4);

        $sql5 = 'CREATE TABLE Booking(
  booking_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  schedule_id INT NOT NULL,
  NAME VARCHAR(50) NOT NULL,
  gender VARCHAR(6) NOT NULL,
  phone_no INT(10) NOT NULL,
  fare INT NOT NULL,
  FOREIGN KEY(schedule_id) REFERENCES SCHEDULE(schedule_id)
    ON UPDATE CASCADE ON DELETE CASCADE
);
';
        DB::connection()->getPdo()->exec($sql5);
//
   $sql6='CREATE TABLE BusOperator (operator_id INT NOT NULL PRIMARY KEY,password VARCHAR(50) NOT NULL ,company_name VARCHAR(50) NOT NULL ,phone_no INT(10) NOT NULL ,fare INT NOT NULL )';
       DB::connection()->getPdo()->exec($sql6);
////        $sql9 = 'CREATE TABLE members (`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,`username` VARCHAR(30) NOT NULL, `email` VARCHAR(50) NOT NULL, `password` CHAR(128) NOT NULL, `salt` CHAR(128) NOT NULL,role VARCHAR(10) DEFAULT 0,phone_no VARCHAR(20) NOT NULL, company_name VARCHAR (50) NOT NULL , status VARCHAR(1) DEFAULT "d")';
//        DB::connection()->getPdo()->exec($sql9);

        $sql7 = 'CREATE TABLE Booking_seat (booking_id int not null,seat INT NOT NULL ,FOREIGN KEY(booking_id) REFERENCES Booking(booking_id)ON UPDATE CASCADE ON DELETE CASCADE
)';
        DB::connection()->getPdo()->exec($sql7);
//
        $sql8 = "CREATE ALGORITHM = MERGE VIEW `bus_details`  AS SELECT bus.bus_id , bus.route_id, bus.fare, bus.bus_type, schedule.departure_time, schedule.arrival_time, town.town_name FROM bus , schedule , town where bus.bus_id=schedule.bus_id and schedule.departure_id = town.town_id and status='a' ";
      DB::connection()->getPdo()->exec($sql8);

        $sql9 = 'CREATE ALGORITHM = MERGE VIEW `bus_schedule` AS select s.schedule_id,  b.bus_id, b.company_name, b.bus_type, b.fare, b.total_seats, s.departure_time, s.arrival_time , s.departure_id , b.route_id from bus as b JOIN schedule as s on b.bus_id=s.bus_id';
        DB::connection()->getPdo()->exec($sql9);
        $this->create_triggers();

        $sql10 = "CREATE INDEX indexBus ON bus(bus_id);
CREATE INDEX indexdRoute ON route(route_id);
CREATE INDEX indexTown ON town(town_id);
CREATE INDEX indexBooking ON booking(booking_id);
CREATE INDEX indexSchedule ON SCHEDULE(schedule_id);
CREATE INDEX indexBusOperator ON busoperator(operator_id);";

        DB::connection()->getPdo()->exec($sql0);








    }


    public function create_triggers()
    {
        $trig_ins_route = "Create trigger ins_route before insert on route
        for each row begin
            if new.route_id<0 then
                signal sqlstate '45000' set MESSAGE_TEXT = 'invalid id';
            end if;
        end;";
        DB::connection()->getPdo()->exec($trig_ins_route);

        $trig_ins_bus = "Create trigger ins_bus before insert on bus
        for each row begin
            if new.bus_id<0 then
                signal sqlstate '45000' set MESSAGE_TEXT = 'invalid id';
            end if;
        end;";
        DB::connection()->getPdo()->exec($trig_ins_bus);

        $trig_upd_route = "Create trigger upd_route before update on route
        for each row begin
            if new.route_id not in (
            select r.route_id
            From route r)

             then signal sqlstate '45000' set MESSAGE_TEXT = 'invalid id';
            end if;
        end;";
        DB::connection()->getPdo()->exec($trig_upd_route);

        $delete_route_bus = "CREATE TRIGGER delete_bus AFTER DELETE ON route
            FOR EACH ROW BEGIN
                DELETE FROM bus WHERE bus.route_id=OLD.route_id;
            END;";
        DB::connection()->getPdo()->exec($delete_route_bus);

        $trig_ins_schedule = "Create trigger ins_schedule before insert on schedule
        for each row begin
            if new.bus_id not in (
            select b.bus_id
            From bus b)

             then signal sqlstate '45000' set MESSAGE_TEXT = 'invalid id';
            end if;
        end;";
        DB::connection()->getPdo()->exec($trig_ins_schedule);

        $sql="create index indexbus on bus (bus_id)";
        DB::connection()->getPdo()->exec($sql);

        $sql="create index indexopr on  members(id,company_name,status)";
        DB::connection()->getPdo()->exec($sql);

    }


    public function down()
    {
        $sql1 = 'drop table Bus';
        DB::connection()->getPdo()->exec($sql1);

        $sql2 = 'drop table Route';
        DB::connection()->getPdo()->exec($sql2);

        $sql3 = 'drop table Town';
        DB::connection()->getPdo()->exec($sql3);

        $sql4 = 'drop table Schedule';
        DB::connection()->getPdo()->exec($sql4);

        $sql5 = 'drop table members';
        DB::connection()->getPdo()->exec($sql5);

//        $sql6 = 'drop table Operatorbus';
//        DB::connection()->getPdo()->exec($sql6);

        $sql7 = 'drop table Booking';
        DB::connection()->getPdo()->exec($sql7);

        $sql8 = 'drop table Booking_seat';
        DB::connection()->getPdo()->exec($sql8);

        $sql11 = 'drop table login_attempts';
        DB::connection()->getPdo()->exec($sql11);
    }
}
