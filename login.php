<?php

include_once("adb.php");

class login extends adb {

    function login() {
        adb::adb();
    }

    function loginAs($user, $pass) {
        $query = "select count(*) as c from users where username = '$user' and password = '$pass'";
        $this->query($query);
        $result = $this->fetch();
        if ($result[c] == 1) {
            return true;
        } else {
            return false;
        }
    }

}

?>