<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.2//EN"
    "http://www.openmobilealliance.org/tech/DTD/xhtml-mobile12.dtd">

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head xmlns="http://www.w3.org/1999/xhtml">
        <meta charset="UTF-8">
            <title>Bus Administrator</title>
    </head>
    <body>
        <?php
        $_SERVER['ALL_HTTP'] = isset($_SERVER['ALL_HTTP']) ? $_SERVER['ALL_HTTP'] : '';

        $mobile_browser = '0';

        if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {

            $mobile_browser++;
        }

        if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']), 'application/vnd.wap.xhtml+xml') > 0) or ( (isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {

            $mobile_browser++;
        }

        $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));

        $mobile_agents = array(
            'w3c ', 'acs-', 'alav', 'alca', 'amoi', 'audi', 'avan', 'benq', 'bird', 'blac',
            'blaz', 'brew', 'cell', 'cldc', 'cmd-', 'dang', 'doco', 'eric', 'hipt', 'inno',
            'ipaq', 'java', 'jigs', 'kddi', 'keji', 'leno', 'lg-c', 'lg-d', 'lg-g', 'lge-',
            'maui', 'maxo', 'midp', 'mits', 'mmef', 'mobi', 'mot-', 'moto', 'mwbp', 'nec-',
            'newt', 'noki', 'oper', 'palm', 'pana', 'pant', 'phil', 'play', 'port', 'prox',
            'qwap', 'sage', 'sams', 'sany', 'sch-', 'sec-', 'send', 'seri', 'sgh-', 'shar',
            'sie-', 'siem', 'smal', 'smar', 'sony', 'sph-', 'symb', 't-mo', 'teli', 'tim-',
            'tosh', 'tsm-', 'upg1', 'upsi', 'vk-v', 'voda', 'wap-', 'wapa', 'wapi', 'wapp',
            'wapr', 'webc', 'winw', 'winw', 'xda', 'xda-');

        if (in_array($mobile_ua, $mobile_agents)) {
            $mobile_browser++;
        }
        if (strpos(strtolower($_SERVER['ALL_HTTP']), 'OperaMini') > 0) {
            $mobile_browser++;
        }
        if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'windows') > 0) {
            $mobile_browser = 0;
        }
        if ($mobile_browser > 0) {
// do something
            print "This is a mobile";
//            header("location: login_mobile.php"); //redirect to home page change this name JUDAH
            echo "<a href='login_mobile.php'>click here</a>"; //if redirect fails, provide a link
        } else {
// do something else
            print "NOT a mobile";
            header("location: login_web.php"); //redirect to home page
            echo "<a href='login_web.php'>click here</a>"; //if redirect fails, provide a link

        }
        ?>
    </body>
</html>
