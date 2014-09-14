<?php

include_once("adb.php");

class queries extends adb {

    function queries() {
        adb::adb();
    }

    /*
     * Gets the number of passengers: on the bus
     *                              : that have reserved seats
     *                              : total number of seats on this bus
     */

    function get_data_on_load() {
        $query = "select * from numofpsngers where numofpsngersid = '1'";
        return $this->query($query);
    }

    /**
     * Update the number of passengers: on the bus
     *                              : that have reserved seats
     *           and maybe                   : total number of seats on this bus
     */
    function update_data($num_of_passengers, $reserved_seats) {
        $query = "Update numofpsngers SET onbus='$num_of_passengers', reserved='$reserved_seats', lastModified=now() where numofpsngersid = '1'";
        return $this->query($query);
    }

}
