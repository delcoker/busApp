<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include_once("adb.php");

class transaction_class extends adb {

   function transaction_class() {
      adb::adb();
   }

   
   function transaction($user_id, $amount_deducted, $ticket_id, $amount_left, $pick_up_location){
      $query2 = "Insert into transaction(user_id, amount_deducted, ticket_id, amount_left, date_created, date_modified, pick_up_location) values($user_id, $amount_deducted, $ticket_id, $amount_left, now(), now(), $pick_up_location)";
//      print $query2;
      return $this->query($query2);
   }
   
   function search_transactions($user_id){
      $query = "Select ticket_id as c from transaction where user_id = $user_id and DATE(now()) = DATE(date_created);";
//      print $query;
      return $this->query($query);
   }
   
   function get_all_transactions_today(){
      $query = "Select * from transaction left join user on user.user_id = transaction.user_id left join dropoff on transaction.pick_up_location = dropoff.dropoff_id where DATE(now()) = DATE(transaction.date_created);";
//      print $query;
      return $this->query($query);
   }
   
   function get_all_transactions(){
      $query = "Select user.username, transaction.date_created, transaction.amount_deducted from transaction left join user on user.user_id = transaction.user_id left join dropoff on transaction.pick_up_location = dropoff.dropoff_id;";
//      print $query;
      return $this->query($query);
   }
   
   function get_all_transactions_between($start, $end){
      $query = "Select * from transaction left join user on user.user_id = transaction.user_id left join dropoff on transaction.pick_up_location = dropoff.dropoff_id where transaction.date_created between $start and $end;";
//      print $query;
      return $this->query($query);
   }
}
