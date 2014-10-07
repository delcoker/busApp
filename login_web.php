<?php
//if the form has been submitted, then
// 	call login function
//	if login function return true 
//		start session 
//		load user profile into session 
//		redirect to home page
//	else
//		set error
//		show the login form
//	end if
//else 
//	show the login form
//        $_REQUEST['age'];
//include_once './login_class.php';
//$msg = "Login";
//if (isset($_REQUEST['username'])) {
//    //the login form has been submitted
//    $username = $_REQUEST['username'];
//    $password = $_REQUEST['password'];
//    //call login to check username and password
////    print $username;
//    $objlog = new login_class();
//    if ($objlog->loginAs($username, $password)) {
////        session_start(); //initiate session for the current login
////			print $username;
//        $objlog->loadUserProfile($username); //load user information into the session
//        header("location: mobile_and_passenger.php"); //redirect to home page
//        echo "<a href='mobile_and_passenger.php'>click here</a>"; //if redirect fails, provide a link
//        exit();
////        header("location: web_and_passenger.php"); //redirect to home page
////        echo "<a href='web_and_passenger.php'>click here</a>"; //if redirect fails, provide a link
////        exit();
//    } else {
//        //if login returns false, then something is worng
//        $msg = "username or password is wrong";
//    }
//}
?>
<html>
    <head>
        <title>Login To BusAsh</title>
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/login_mobile.js"></script>
    </head>
    <body>
        <!--<form action="login_web.php" method="GET">-->
            <table align="center" width="80%">
                <tr>
                    <td width="30%"></td>
                    <td colspan="2" align="center"><span><?php ?></span></td>
                    <td width="30%"></td>
                </tr>
                <tr>
                    <td width="30%"></td>
                    <td>username</td>
                    <td><input type="text" name="username" id="username"></td>
                    <td width="30%"></td>
                </tr>
                <tr>
                    <td width="30%"></td>
                    <td>password</td>
                    <td><input type="password" name="password" id="password"></td>
                    <td  width="30%"></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><button name="submit" value="login" onclick="login()">Login</button></td>
                    <td></td>
                </tr>
            </table>
        <!--</form>-->
    </body>
</html>

<?php

//function login($usern, $passw) {
//    $database = "webtechGroup5";
//    $server = "localhost";
//    $username = "root";
//    $password = "";
//    //connect to db
//    $link = mysql_connect($server, $username, $password);
//    //select db
//    if (!$link) {
//        print "error";
//    }
//    if (!mysql_select_db($database, $link)) {
//        print "error";
//    }
////    print $usern;
//    $query = "Select * from user where username = '$usern' and password = $passw;";
////    print $query;
//    $dataset = mysql_query($query, $link);
////                print_r( $dataset);
//    if (!$dataset) {
////                    print "sth";
//        return false;
//    }
//
//    $row = mysql_fetch_assoc($dataset);
////                print_r($row);
//    if (!$row) {
//        return false;
//    }
////                if
////                while($row){
////                    
////                    $row = mysql_fetch_assoc($dataset);
////                }
//    //if connection fails, return false
//    //query for the $username and $password
//    //if the user with the right password is found, 
//    //	return true
//    //else 
//    //	return false
//    return true;
//}
//
//function loadUserProfile($username) {
//    //load username and other informaiton into the session 
//    //the user informaiton comes from the database
//    $_SESSION['username'] = $username;
//    $_SESSION['usertype'] = 1;
//    $_SESSION['start'] = 0;
//    //permission
//}
//