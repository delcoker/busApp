<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include_once("adb.php");

class user_class extends adb {

   function user_class() {
      adb::adb();
   }

   function get_user_details($user_id) {
      $query = "select * from user where user_id = '$user_id'";
//        print "quere " . $query;
      return $this->query($query);
   }

   function deduction($user_id, $amount_left){
      $query = "UPDATE user
				SET amount_left = '$amount_left'
                                WHERE user_id = '$user_id'";
//      print $query;
      return $this->query($query);
   }

}
