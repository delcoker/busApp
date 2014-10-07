<!DOCTYPE html>
<html>
   <head>
      <script src="js/jquery-1.11.1.min.js"></script>
      <link rel="stylesheet" href="css/jquery.mobile-1.4.4.css">
      <script src="js/jquery.mobile-1.4.4.min.js"></script>
      <link rel="stylesheet" href="css/delcss.css">
      <link rel="stylesheet" href="css/images/ajax-loader.gif">
      <script src="js/login_mobile.js"></script>
      <meta name="viewport" content="width-device-width, initial-scale=1">
   </head>
   <body>
      <!-------------------------------------------------------->
      <div data-role="page" id="pageone" data-theme="b">
         <div data-role="header">
            <h1>BusAsh</h1>
         </div>
         <!-------------------------------------------------------->
         <div role="main" class="ui-content">
            <p>Please Login</p>
            <!--<form>-->
            <!--            <form method="get" action="login_mobile_action.php">-->
            <div data-role="fieldcontain">
               <label for="username">Username:</label>
               <input type="text" name="username" id="username" placeholder="kingston.coker@ashesi.edu.gh">
               <div> &nbsp; </div>
               <label for="password">Password:</label>
               <input type="password" name="password" id="password" placeholder="* * * * * * * * * *">
               <div> &nbsp; </div><label></label>

               <input type="submit" id="login" value="Login" onclick="login()">
               <div> &nbsp; </div><label></label>
               <a href="#" data-transition="slidedown">Forgotten Password?</a>
            </div>
            <!--</form>-->
         </div>
         <!-------------------------------------------------------->
         <div data-role="footer">
            <h1>Del Works</h1>
         </div>
         <!--<a href="#pageone" data-transition="pop">Slide to Page</a>-->
      </div>
      <!----------------------------------------------------------------------------------------------------------------->
   </div>
</body>
</html>