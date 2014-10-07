<?php

include_once './login_class.php';
$msg = "Login";

if (isset($_REQUEST['username'])) {
   //the login form has been submitted
   $username = $_REQUEST['username'];
   $password = $_REQUEST['password'];
   //call login to check username and password
//    print $username;
   $objlog = new login_class();
   if ($objlog->loginAs($username, $password)) {
      session_start(); //initiate session for the current login
//			print $username;
      $objlog->loadUserProfile($username); //load user information into the session

      if ($_SESSION['role'] == 3) {
         header('location: mobile_and_passenger.php'); //redirect to home page

         echo "<a href='mobile_and_passenger.php'>click here</a>"; //if redirect fails, provide a link
         die();
      } else if ($_SESSION['role'] == 2) {

         header("location: mobile_and_driver.php"); //redirect to home page

         echo "<a href='mobile_and_driver.php'>click here</a>"; //if redirect fails, provide a link
         exit();
      } else if ($_SESSION['role'] == 1) {

         header("location: mobile_and_admin.php"); //redirect to home page

         echo "<a href='mobile_and_admin.php'>click here</a>"; //if redirect fails, provide a link
      }
      exit();
   } else {
      //if login returns false, then something is worng
//      print "something went wrong";
      $msg = "username or password is wrong";
      header("location: login_mobile.php");
   }
}
