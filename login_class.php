<?php

include_once("adb.php");

class login_class extends adb {

   function login() {
      adb::adb();
   }

   function loginAs($user, $pass) {
      $query = "select count(*) as c from user where username = '$user' and password = '$pass'";
//        print "quere " . $query;
      $this->query($query);
      
      $result = $this->fetch();
      if ($result['c'] == 1) {
         
//         $this->loadUserProfile($user);
         return true;
      } else {
         return false;
      }
   }

   function loadUserProfile($username) {
      //load username and other informaiton into the session      
      $query = "select * from user where username = '$username';";
//      print $query;
      $this->query($query);

      $result = $this->fetch();
//      session_destroy();
      session_start();
      
      $_SESSION['username'] = $username;
      $_SESSION['role_id'] = $result['role_role_id'];
      $_SESSION['amount_left'] = $result['amount_left'];
      $_SESSION['id'] = $result['user_id'];
      
      return $result;

   }

}
