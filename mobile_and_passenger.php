<!DOCTYPE html>
<html>
   <head>
      <?php
//      session_destroy();
      session_start();

      if (!isset($_SESSION['username'])) {
         header("location: index_for_mobile_web.php");
      }
      ?>
      <script src="js/jquery-1.11.1.min.js"></script>
      <link rel="stylesheet" href="css/jquery.mobile-1.4.4.css">
      <script src="js/jquery.mobile-1.4.4.min.js"></script>
      <script src="js/jquery.qrcode.min.js" type="text/javascript"></script>
      <script src="js/qrcode.js" type="text/javascript"></script>
      <link rel="stylesheet" href="css/delcss.css">
      <link rel="stylesheet" href="css/images/ajax-loader.gif">

      <script src="http://maps.googleapis.com/maps/api/js?v=3.exp">
      </script>

      <meta name="viewport" content="width-device-width, initial-scale=1">
   </head>
   <body>        
      <!----------------------------------------------------------------------------------------------------------------->
      <div data-role="page" id="home" data-theme="b">
         <div data-role="header">
            <h1>Home</h1>
            <?php include './header.php'; ?>
            <div data-role="navbar"> 
               <ul>
                  <li><a href="#home" data-icon="home" data-iconpos="left" class="ui-btn-active ui-state-persist" data-transition="slideup">Home</a></li>
                  <li><a href="#reserve" data-icon="arrow-d" data-iconpos="left" data-transition="pop" >Reserve</a></li>
                  <li><a href="#anylink" data-icon="search" data-iconpos="left" data-transition="slideup">Map</a></li>
               </ul>
            </div>
            <!--classs="ui-btn-active ui-state-persist"-->
         </div>
         <!----------------------------------------------------------->
         <?php include_once './details_class.php'; ?>
         <div role="main" class="ui-content">
            <div data-role="collapsible-set">
               <div data-role="collapsible">
                  <h1># of passengers on bus</h1>
                  <p>
                     <?php
                     $obj_details = new deatils_class();
                     $obj_details->get_all_details();

                     $row = $obj_details->fetch();
                     print $row['numOfPssngrsBus'];
                     ?>
                  </p>
               </div>
               <div data-role="collapsible">
                  <h1># of reserved seats</h1>
                  <p><?php print $row['numOfPssngrsReserved'];
                     ?></p>
               </div>
               <div data-role="collapsible">
                  <h1># of seats on bus</h1>
                  <p><?php print $row['numOfSeats'];
                     ?></p>
               </div>
            </div>

            <h2>Bus Stops:</h2>
            <ol data-role="listview" data-inset="true" data-filter="true">
               <?php
               include_once './dropoff_class.php';
               $obj_drop = new dropoff_class();
               $obj_drop->get_all_dropoffs();
               $row_drops = $obj_drop->fetch();
               while ($row_drops) {
                  print "<li><a href='#'>";
                  print $row_drops['dropoff_name'];
                  print "    -   ";
                  print $row_drops['dropoff_time'];
                  print "</a></li>";
                  $row_drops = $obj_drop->fetch();
               }
               ?>
            </ol>


         </div>
         <!------------------------------------------------------------->
         <div data-role="footer">
            <div data-role="controlgroup" data-type="horizontal">
               <!--<Caption of group:</p>-->
               <a href="#" data-icon="arrow-l"  data-role="button" data-rel="back">Go Back</a>
            </div>
         </div>
      </div>
      <!------------------------------------------------------------------------------------------------------------------>
      <div data-role="page" id="reserve" data-theme="b">
         <div data-role="header">
            <h1>Reservations</h1>
            <?php include './header.php'; ?>
            <div data-role="navbar"> 
               <ul>
                  <li><a href="#home" data-icon="home" data-iconpos="left"  data-transition="slideup">Home</a></li>
                  <li><a href="#reserve" data-icon="arrow-d" data-iconpos="left" data-transition="pop" class="ui-btn-active ui-state-persist">Reserve</a></li>
                  <li><a href="#anylink" data-icon="search" data-iconpos="left" data-transition="slideup">Map</a></li>
               </ul>
            </div>
         </div>

         <!------------------------------------------------------------>
         <div role="main" class="ui-content">

            # of seats left:
            <?php
            $last_insert_id = 1;
            include_once './details_class.php';
            $obj_info = new deatils_class();
            $obj_info->get_details($last_insert_id);
            $row_info = $obj_info->fetch();
//                   print_r ($row_info);
            if ($row_info) {
               print $row_info['seatsLeft'];
            }
            ?>
            <br>
            # reserved seats:<?php
            if ($row_info) {
               print $row_info['numOfPssngrsReserved'];
            }
            ?>
            <br>
            # passengers on bus: <?php
            if ($row_info) {
               print $row_info['numOfPssngrsBus'];
            }
            ?>
            <br>
            Amount Left: <?php
            include_once './user_class.php';
            $user_obj = new user_class();
            $user_obj->get_user_details($_SESSION['id']);
            $row_user = $user_obj->fetch();
            if ($row_user) {
//               print_r($row_info);
               print $row_user['amount_left'];
            }
            ?>

            <div data-role="controlgroup" data-type="vertical">
               <!--<Caption of group:</p>-->
               <a href="#reserve-days" data-role="button">Reserve a seat</a>
               <!--When u click this, it reserves a seat for you, changes to drop a seat and takes you to payment page-->
               <a href="#view_payment" data-role="button">View Payment</a>
               <a href="#anylink" data-role="button">View Bus Location</a>
            </div>

         </div>
         <!------------------------------------------------------------>
         <div data-role="footer">
            <div data-role="controlgroup" data-type="horizontal">
               <!--<Caption of group:</p>-->
               <a href="#" data-icon="arrow-l" icon-pos="left" data-role="button" data-rel="back">Go Back</a>
            </div>
         </div>
      </div>

      <!------------------------------------------------------------------------------------------------------------------>
      <div data-role="page" id="payment" data-theme="b">
         <div data-role="header">
            <h1>Payment</h1>
            <?php include './header.php'; ?>
            <div data-role="navbar"> 
               <ul>
                  <li><a href="#home" data-icon="home" data-iconpos="left"  data-transition="slideup">Home</a></li>
                  <li><a href="#reserve" data-icon="arrow-d" data-iconpos="left" data-transition="pop" class="ui-btn-active ui-state-persist">Reserve</a></li>
                  <li><a href="#anylink" data-icon="search" data-iconpos="left" data-transition="slideup">Map</a></li>
               </ul>
            </div>
         </div>

         <!------------------------------------------------------------>
         <div role="main" class="ui-content">
            <input type="hidden" value="<?php print($_SESSION['id']); ?>" id="id">

            <input type="hidden" value="<?php print($row_user['amount_left']); ?>" id="amount_left">

            Cost Of Trip: <input type="text" value="<?php print "3.00"; ?>" id="fare" disabled="true"> <!---make this dynamic--->
            <div data-role="controlgroup" data-type="horizontal">
               <a href="#reserve" data-role="button" onclick='payment()'> <img class="img-size" src="css/images/ash-logo.jpg">Ash</a>
               <a href="#reserve" data-role="button" > <img class="img-size" src="css/images/mtn-logo.png">M-Mon</a>
            </div>
            <div data-role="controlgroup" data-type="horizontal">
               <!--                    <Caption of group:</p>-->
               <a href="#reserve" data-role="button"> <img class="img-size" src="css/images/iwallet-logo.jpg">i-Wall</a>
               <a href="#reserve" data-role="button"><img class="img-size" src="css/images/visa-logo.jpg">VISA</a>
            </div>

         </div>
         <!------------------------------------------------------------>
         <div data-role="footer">
            <div data-role="controlgroup" data-type="horizontal">
               <!--<Caption of group:</p>-->
               <a href="#" data-icon="arrow-l" icon-pos="left" data-role="button" data-rel="back">Go Back</a>
               <!--                        <a href="#home" data-role="button">Home</a>
                                       <a href="reserve" data-role="button">Reserve</a>
                                       <a href="#" data-role="button">Button 3</a>-->
            </div>
         </div>
      </div>

      <!------------------------------------------------------------------------------------------------------------------>
      <div data-role="page" id="reserve-days" data-theme="b">
         <div data-role="header">
            <h1>Reservations</h1>
            <?php include './header.php'; ?>
            <div data-role="navbar"> 
               <ul>
                  <li><a href="#home" data-icon="home" data-iconpos="left"  data-transition="slideup">Home</a></li>
                  <li><a href="#reserve" data-icon="arrow-d" data-iconpos="left" data-transition="pop" class="ui-btn-active ui-state-persist">Reserve</a></li>
                  <li><a href="#anylink" data-icon="search" data-iconpos="left" data-transition="slideup">Search</a></li>
               </ul>
            </div>
            <!--classs="ui-btn-active ui-state-persist"-->
         </div>

         <!------------------------------------------------------------>
         <div role="main" class="ui-content">


            <div data-role="collapsible">
               <h1>Today</h1>
               <p>Make a payment for today</p>
            </div>
            <br>
            <!--<a href="#payment" data-role="button">Continue</a>-->
            Choose Pickup Location
            <ol data-role="listview" data-inset="true" data-filter="true">
               <?php
//               include_once './dropoff_class.php';
               $obj_drop2 = new dropoff_class();
               $obj_drop2->get_all_dropoffs();
               $row_drops2 = $obj_drop2->fetch();
               while ($row_drops2) {
                  print "<li><a href='#' onclick='pick_up($row_drops2[dropoff_id])'>";
                  print $row_drops2['dropoff_name'];
                  print "    -   ";
                  print $row_drops2['dropoff_time'];
                  print "</a></li>";
                  $row_drops2 = $obj_drop2->fetch();
               }
               ?>
            </ol>

         </div>
         <!------------------------------------------------------------>
         <div data-role="footer">
            <div data-role="controlgroup" data-type="horizontal">
               <!--<Caption of group:</p>-->
               <a href="#" data-icon="arrow-l" icon-pos="left" data-role="button" data-rel="back">Go Back</a>
               <!--                        <a href="#home" data-role="button">Home</a>
                                       <a href="reserve" data-role="button">Reserve</a>
                                       <a href="#" data-role="button">Button 3</a>-->
            </div>
         </div>
      </div>
      <!------------------------------------------------------------------------------------------------------------------>
      <div data-role="page" id="view_payment" data-theme="b">
         <div data-role="header">
            <h1>View Payment</h1>
            <?php include './header.php'; ?>
            <div data-role="navbar"> 
               <ul>
                  <li><a href="#home" data-icon="home" data-iconpos="left"  data-transition="slideup">Home</a></li>
                  <li><a href="#reserve" data-icon="arrow-d" data-iconpos="left" data-transition="pop" class="ui-btn-active ui-state-persist">Reserve</a></li>
                  <li><a href="#anylink" data-icon="search" data-iconpos="left" data-transition="slideup">Map</a></li>
               </ul>
            </div>
            <!--classs="ui-btn-active ui-state-persist"-->
         </div>

         <!------------------------------------------------------------>
         <div role="main" class="ui-content">
            <h1>
               <div id="status">
                  <?php
                  include_once './transaction_class.php';
                  $paid_or_naa = new transaction_class();
                  if ($paid_or_naa->search_transactions(($_SESSION['id']))) {
                     $already_reserved = $paid_or_naa->fetch();
                  }
//   print_r( $already_reserved);
                  if ($already_reserved['c'] != 0) {
                     echo "PAID";
//                     echo "<a href='#view_payment' data-role='button' onload='qrgenerate($already_reserved[c])'>click to view code</a>";
//                     echo "<a href='mobile_and_passenger.php'>click to view qr code</a>";
                  } else {
                     print "NOT PAID";
                  }
                  ?>
                  <br>

                  <a href="#" data-role="button" onclick="qrgenerate(<?php print $already_reserved['c']; ?>)">click to view code</a>
               </div>
               <div id="qrcode"></div>
            </h1>
         </div>
         <!------------------------------------------------------------>
         <div data-role="footer">
            <div data-role="controlgroup" data-type="horizontal">
               <!--<Caption of group:</p>-->
               <a href="#" data-icon="arrow-l" icon-pos="left" data-role="button" data-rel="back">Go Back</a>
            </div>
         </div>
      </div>
      <!------------------------------------------------------------------------------------------------------------------>
      <div data-role="page" id="anylink" data-theme="b">
         <div data-role="header">
            <h1>Maps</h1>
            <?php include './header.php'; ?>
            <div data-role="navbar"> 
               <ul>
                  <li><a href="#home" data-icon="home" data-iconpos="left"  data-transition="slideup">Home</a></li>
                  <li><a href="#reserve" data-icon="arrow-d" data-iconpos="left" data-transition="pop" >Reserve</a></li>
                  <li><a href="#anylink" data-icon="search" data-iconpos="left" data-transition="slideup" class="ui-btn-active ui-state-persist">Map</a></li>
               </ul>
            </div>
            <!--classs="ui-btn-active ui-state-persist"-->
         </div>

         <!------------------------------------------------------------>
         <div role="main" class="ui-content">
            <p id="demo">Click the button to get your coordinates:</p>
            <button onclick="getLocationBus()">Click to get bus location</button>


            <div data-role="page" id="map-page" data-url="map-page">
               <div data-role="header" data-theme="a">
                  <h1>Maps</h1>
               </div>
               <div role="main" class="ui-content" id="map-canvas">
                   map loads here... 
               </div>
            </div>





         </div>
         <!------------------------------------------------------------>
         <div data-role="footer">
            <div data-role="controlgroup" data-type="horizontal">
               <!--<Caption of group:</p>-->
               <a href="#" data-icon="arrow-l" icon-pos="left" data-role="button" data-rel="back">Go Back</a>
            </div>
         </div>
      </div>

      <!------------------------------------------------------------------------------------------------------------------>

      <script src="js/login_mobile.js"></script>
   </body>
</html>

