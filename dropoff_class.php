<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once("adb.php");

/**
 * Description of religion
 *
 * @author Kc
 */
class dropoff_class extends adb{
    function deatils_class() {
        adb::adb();
    }

    /**
     * query all religion in the table and store the dataset in $this->result	
     * @return if successful true else false
     */
    function get_all_dropoffs() {
        $query = "select * from dropoff";
        $res = $this->query($query);
//        print("--------------------------------------------------------------------------------");
//        print($res);
        return $res;
    }
    
    /**
     * query a vaccines in the table and store the dataset in $this->result	
     * @return if successful true else false
     */
    function get_details($detail_id) {
        $query = "select * from info where info_id = $detail_id";
        $res = $this->query($query);
//        print("--------------------------------------------------------------------------------");
//        print($res);
        return $res;
    }

   function add_info($info_name, $church, $congregation
                        , $date_of_baptism, $place_of_baptism) {
        //write the SQL query and call $this->query()
        $query = "Insert into religion(religion_name, church, congregation,
            date_of_baptism, place_of_baptism, last_modified)
            values ('$religion_name', '$church', '$congregation'
                        , '$date_of_baptism', '$place_of_baptism', now());";
        print $query;
        return $this->query($query);
    }


    /**
     * updates the record identified by id 
     */
    function update_info($info_id, $seatsLeft, $numOfPssngrsReserved, $numOfSeats
                        , $numOfPssngrsBus, $longitude, $locationAddress, $latitude, $date_created) {
        //write the SQL query and call $this->query()
        $query = "Update info set seatsLeft = $seatsLeft
                                    ,   numOfPssngrsReserved = $numOfPssngrsReserved
                                    ,   numOfSeats = $numOfSeats
                                    ,   numOfPssngrsBus = $numOfPssngrsBus
                                    ,   longitude = $longitude, 
                                       locationAddress = $locationAddress, latitude = $latitude, date_created = $date_created
                                    ,   date_modified = now()
                                     where  info_id = $info_id";
//        print $query;
//        print mysql_error();
        return $this->query($query);
    }

    /**
     * deletes a medical record based on the id
     */
    function delete_religion($religion_id) {
        $query = "Delete from orphanage_db.religion where religion_id = $religion_id";
        print $query;
        return $this->query($query);
    }
}

