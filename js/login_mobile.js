// created because database structure changed the last minute
var global_drop_off = 0;

function syncAjax(u) {
   var obj = $.ajax({url: u, async: false});
   return $.parseJSON(obj.responseText);
}

function logout() {
   window.open("logout.php", "_self");
}

function login() {

   //complete the url
   var user = document.getElementById("username").value;
   var pass = document.getElementById("password").value;

   var u = "login_mobile_action_1.php?cmd=2&user=" + user + "&pass=" + pass;
//   prompt("U",u);
   r = syncAjax(u);

//   prompt(r.user);

//                alert(r.result);
   if (r.result === 1) {
      if (r.user.role === 3) {
//         prompt("url", u);
//      debugger;
         window.open("mobile_and_passenger.php#reserve", "_self");
      }
      else if (r.user.role === 2) { // driver
//         prompt("url", u);
//      debugger;
         window.open("mobile_and_driver.php#home", "_self");
      }
      else if (r.user.role === 1) { // admin
//         prompt("url", u);
//      debugger;
         window.open("mobile_and_admin.php#reserve", "_self");
      }
      else {
         alert("User does nhot have a role!!");
      }
   }
   else {
      alert("username or password wrong");
      return;
   }
}

function pick_up(dropoff_id) {
   if (dropoff_id === 0) {
      alert("No pick up location?");
      return;
   }
   else {
//      payment();
      global_drop_off = dropoff_id;
      window.open("mobile_and_passenger.php#payment", "_self");
//      return dropoff_id;
   }
}

function qrgenerate(rand) {
   if (rand === "" || rand == null) {
      alert("Times are hard huh? You haven't paid yet! Sorry");
      return;
   }
   $('#qrcode').text("");
   jQuery('#qrcode').qrcode({
      text: rand.toString()
   });
}

function payment() {
//   alert("here");
//   $("#status").text("NOT PAID");
   var user_id = $("#id").val();
   var amount_before = $("#amount_left").val();
   if (amount_before - $("#fare").val() >= 0) {
      var new_amount = amount_before - $("#fare").val();

      var ticket = Math.floor((Math.random() * 1000) + 1);
//      alert(ticket);

      var url = "login_mobile_action_1.php?cmd=3&user_id=" + user_id + "&new_amount=" + new_amount + "&amount_before=" + amount_before + "&fare=" + $("#fare").val() + "&ticket_num=" + ticket + "&location=" + global_drop_off;
//      prompt("url", url);
      r = syncAjax(url);
//      prompt("url", r.result);
      if (r.result === 1) { // signifies update
         alert("Your ticket is available in another tab. Go to payment to view");
//         $("#status").text("PAID");
//         qrgenerate(ticket);
         window.open("mobile_and_passenger.php#view_payment", "_self");
         global_drop_off = 0;
      }
      else if (r.result === 0 && r.trans.message === "Already Reserved") {
         alert("You have " + r.trans.message);
//         alert(r.trans.ticket_num);
//         $("#status").text("PAID");
//         qrgenerate(r.trans.ticket_num);
         window.open("mobile_and_passenger.php#view_payment", "_self");
//         global_drop_off = 0;
      }
      else {
         alert(r.trans.message);
         alert("unsuccessful");
         global_drop_off = 0;
         return;
      }
   }
   else {
      alert("unsuccessful, not enough funds, you broke");
      global_drop_off = 0;
   }
}

var x = document.getElementById("demo");

function getLocation() {
//   console.log("called");
   if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition, showError);
   } else {
      x.innerHTML = "Geolocation is not supported by this browser.";
   }
}

function getLocationBus() {
//   console.log("called");
//   if (navigator.geolocation) {
   navigator.geolocation.getCurrentPosition(showPositionBus, showError);
//   } else {
//      x.innerHTML = "Geolocation is not supported by this browser.";
//   }
}

function showPositionBus(position) {

   var url = "login_mobile_action_1.php?cmd=5";
//      prompt("url", url);
   r = syncAjax(url);

   if (r.result === 0) {
      alert(r.message);
      return;
   }

   var a = r.x;
   var b = r.y;

//   alert (a);

   x.innerHTML = "Latitude: " + b +
           "<br>Longitude: " + a;

   showBus(a, b);

}
var gloA = 0;
var gloB = 0;
function showBus(a, b) {
//   debugger;
gloA = a;
gloB = b;
window.open("map.php", "_self");
   /*
    * Google Maps documentation: http://code.google.com/apis/maps/documentation/javascript/basics.html
    * Geolocation documentation: http://dev.w3.org/geo/api/spec-source.html
    */

}

function showPosition(position) {

   x.innerHTML = "Latitude: " + position.coords.latitude +
           "<br>Longitude: " + position.coords.longitude;

//           update database
   var url = "login_mobile_action_1.php?cmd=4&long=" + position.coords.longitude + "&lat=" + position.coords.latitude;
//      prompt("url", url);
   r = syncAjax(url);

   if (r.result === 0) {
      alert(r.message);
   }



   var latlon = position.coords.latitude + "," + position.coords.longitude;

   var img_url = "http://maps.googleapis.com/maps/api/staticmap?center="
           + latlon + "&zoom=14&size=400x300&sensor=false";
   document.getElementById("mapholder").innerHTML = "<img src='" + img_url + "'>";
}

function showError(error) {
   switch (error.code) {
      case error.PERMISSION_DENIED:
         x.innerHTML = "User denied the request for Geolocation.";
         break;
      case error.POSITION_UNAVAILABLE:
         x.innerHTML = "Location information is unavailable.";
         break;
      case error.TIMEOUT:
         x.innerHTML = "The request to get user location timed out.";
         break;
      case error.UNKNOWN_ERROR:
         x.innerHTML = "An unknown error occurred.";
         break;
   }
}

function callEveryHour() {
//   setTimeout(getLocation, 5000);
//   setInterval(getLocation(), 5000);
   getLocation();
//   console.log("called");
//   alert("called");
}

$(document).ready(function () {
//   setTimeout(callEveryHour(), 5000);
//   callEveryHour();
});

$(document).on("pagecreate", "#map-page", function () {
   var defaultLatLng = new google.maps.LatLng(gloA, gloB);  // Default to Hollywood, CA when no geolocation support
//   debugger;
   if (navigator.geolocation) {

      function success(pos) {
         // Location found, show map with these coordinates
         drawMap(new google.maps.LatLng(pos.coords.latitude, pos.coords.longitude));
//            alert(b);
      }
      function fail(error) {
         drawMap(defaultLatLng);  // Failed to find location, show default map
      }
      // Find the users current position.  Cache the location for 5 minutes, timeout after 6 seconds
      navigator.geolocation.getCurrentPosition(success, fail, {maximumAge: 500000, enableHighAccuracy: true, timeout: 6000});
   } else {
      drawMap(defaultLatLng);  // No geolocation support, show default map
   }
   function drawMap(latlng) {

      var myOptions = {
         zoom: 16,
         center: latlng,
         mapTypeId: google.maps.MapTypeId.ROADMAP
      };
      var map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);
      // Add an overlay to the map of current lat/lng
      var marker = new google.maps.Marker({
         position: latlng,
         map: map,
         title: "Bus is here!"
      });
   }
});