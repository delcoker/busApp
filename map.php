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
      <div data-role="page" id="map-page" data-url="map-page">
         <div data-role="header" data-theme="a">
            <h1>Maps</h1>
         </div>
         <div role="main" class="ui-content" id="map-canvas">
            map loads here... 
         </div>
      </div>

      <script src="js/login_mobile.js"></script>
   </body>
</html>