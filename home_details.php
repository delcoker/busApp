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
                     $obj_details->get_details($last_insert_id);

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
               <div data-role="collapsible">
                  <h1># of seats left</h1>
                  <p><?php print ($row['numOfSeats'] - $row['numOfPssngrsReserved'] - $row['numOfPssngrsBus']);
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