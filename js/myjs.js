//// copied function
//// http://stackoverflow.com/questions/210717/using-jquery-to-center-a-div-on-the-screen
//jQuery.fn.center = function () {
//    this.css("position","absolute");
//    this.css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 2) + 
//                                                $(window).scrollTop()) + "px");
//    this.css("left", Math.max(0, (($(window).width() - $(this).outerWidth()) / 2) + 
//                                                $(window).scrollLeft()) + "px");
//    return this;
//}

function center(obj) {
    $(obj).css("position", "absolute");
    $(obj).css("top", Math.max(0, (($(window).height() - $(obj).outerHeight()) / 2) +
            $(window).scrollTop()) + "px");
    $(obj).css("left", Math.max(0, (($(window).width() - $(obj).outerWidth()) / 1) +
            $(window).scrollLeft()) + "px");

    return obj;
}

//<script>
var globalVar;
var spanVarPar;

var globalAddObj;
//$('.classTag1').get(0).tagName;
function search(num) {
    cancel();

    if (num == 1) {
        var search = $("#txtSearch").val();

        if (search == "") {
            $("#divStatus").text("Ha Ha Ha, you did not search for anything");
            $("#divStatus").css({'color': 'yellow'});
            return;
        }

        var u = "health_promotion_action.php?cmd=8&search=" + search;

        r = syncAjax(u);

        if (r.result == 0) {
            //show error message
            $("#divStatus").text("No Health Promotion Found");
            $("#divStatus").css({'color': 'yellow'});
            return;
        }

        reloadTable();
        feedback("Search results for: \"" + search + "\"");
    }
    else
    {
        var u = "health_promotion_action.php?cmd=8&search= ";

        r = syncAjax(u);

        reloadTable();
        feedback("Refresh");
    }
}

function reloadTable() {
    //do this to remove rows from table
    $('.row1').remove();
    $('.row2').remove();

    var table = document.getElementById('searchTable');

    for (var i = 0; i < r.found_promotions.length; i++) {
        var row = table.insertRow(i + 1);

        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);

        if (i % 2 == 0) {
            $(row).addClass('row2');
        }
        else {
            $(row).addClass('row1');
        }

        $(cell2).attr('onclick', 'quickView(this,' + r.found_promotions[i].promotion_id + ")");
        $(cell3).attr({onclick: 'quickView(this,' + r.found_promotions[i].promotion_id + ")"});
        $(cell4).attr({onclick: 'quickView(this,' + r.found_promotions[i].promotion_id + ")"});

        $(cell2).addClass('hotspot1');
        $(cell5).addClass('hotspot');
        $(cell6).addClass('hotspot2');

        $(cell5).attr({onclick: 'edit(this,' + r.found_promotions[i].promotion_id + ")"});
        $(cell6).attr({onclick: 'del(this,' + r.found_promotions[i].promotion_id + ")"});

//                        alert(r.found_promotions[i].promotion_id);
        $(cell1).text(r.found_promotions[i].promotion_id);
        $(cell2).text(r.found_promotions[i].topic);
        $(cell3).text(r.found_promotions[i].method);
        $(cell4).text(r.found_promotions[i].date);
        $(cell5).text("edit");
        $(cell6).text("delete");
    }
}

//makes asynchronous call to the page u and return the JSON object
//result as object
function syncAjax(u) {
    var obj = $.ajax({url: u, async: false});
    return $.parseJSON(obj.responseText);
}



//returns a result object for one vaccine 
function getStudID(id) {
    var u = "student_list_action.php?cmd=2&id=" + id;
    return syncAjax(u);
}

function quickView(obj, id) {
    // cancel so you can load up a previous form
//    cancel();
    var r = getStudID(id);
    if (r.result == 0) {
//        alert("r: " + r);
        //show error message
        return;
    }
//    alert("faskldfjaksd f   "+r.student.prev_sch_id);
    //get the data from JSON object r and get the respective attributes from the object and load into the form
    $("#fnameV").prop("value", r.student.firstname);                        //       alert("topoc: "+r.promotion.topic);
    $("#mnameV").prop("value", r.student.middlename);                       //      alert("alert"+r.promotion.method);
    $("#lnameV").prop("value", r.student.lastname);                          //     alert("alert"+r.promotion.venue);
    $("#dateV").prop("value", r.student.date);                            //     alert("alert"+r.promotion.date);
    $("#dobV").prop("value", r.student.dob);         //  alert("alert"+r.promotion.target_audience);
    $("#natV option[value=" + r.student.nationality + "]").prop('selected', true);
//    alert("alert "+ r.student.nationality);
    $("#pobV").prop("value", r.student.pob);                         //  alert("alert"+r.promotion.remarks);
    $("#htownV option[value=" + r.student.hometown_id + "]").prop('selected', true);
//    $("#guardV option[value=" + r.student.guardian_id + "]").prop('selected', true);                  //    
//    alert("alert "+ r.student.guardian_id);
    $("#prevSV option[value=" + r.student.prev_sch_id + "]").prop('selected', true);
    $("#classfaV").prop("value", r.student.class_seek_adm);                            //   alert("alert"+r.promotion.image);
    $("#medV").prop("value", r.student.medical_info);            //    alert("alert"+r.promotion.subdistrict_id);
    $("#guardV option[value=" + r.student.guardian_id + "]").prop('selected', true);
//    alert(r.student.guardian_id);
    if (r.student.board_hse_id != 0) {
        $("#boardhaV option[value=" + 1 + "]").prop('selected', true);
    }
    else {
        $("#boardhaV option[value=" + 0 + "]").prop('selected', true);
    }

//    prompt(r.student);

    center("#divQuickView");

    //display the form
    $("#divQuickView").fadeIn(250);



    globalVar = id;
    spanVarPar = $(obj).closest("tr");
//    alert(r.student.middlename);
}

function enable() {
    $(".fieldMine > input").prop('disabled', false);
    $(".fieldMine > textarea").prop('disabled', false);
    $(".fieldMine > select").prop('disabled', false);

}

function disable() {
    $(".fieldMine > input").prop('disabled', true);
    $(".fieldMine > textarea").prop('disabled', true);
    $(".fieldMine > select").prop('disabled', true);
}

function edit() {
    enable();
    $("#boardhaV").prop('disabled', true);
}

function addNewStudent() {




    var date = startDatetime;
    var fname = $("#fname").val();
    var mname = $("#mname").val();
    var lname = $("#lname").val();
    var dob = $("#dob").val();
    var nat = $("#nat").val();

    var pob = $("#pob").val();
    var homet = $("#htown").val();
    var gid = addNewGaurdian();
    var prevS = $("#prevS").val();
    var classfa = $("#classfa").val();
    var boardh = $("#boardha").is(':checked');
    var boardha = "";
    debugger;
    if (boardh) {
        boardha = addBHouseInfo();
    }
    else {
        boardha = 1;
    }
    var med = $("#med_textarea").val();

//    debugger;

    var u = "student_list_action.php?cmd=3&fname=" + fname + "&mname=" + mname + "&lname=" + lname + "&dob=" + dob + "&nationality_id=" + nat + "&p_of_birth=" + pob + "&hometown_id=" + homet + "&guardian_id=" + gid + "&prev_sch_id=" + prevS + "&class_seek_adm=" + classfa + "&board=" + boardha + "&medical_info=" + med + "&date=" + date;

    r = syncAjax(u);

    prompt("Student Added", r.student.firstname + " " + r.student.lastname);
}

function addBHouseInfo() {
    var date = startDatetime;
    var father = $("#fatherName").val();
    var mother = $("#motherName").val();
    var applicant = $("#gidfname").val() + " " + $("#gidmname") + " " + $("#gidlname");

    var u = "student_list_action.php?cmd=10&father=" + father + "&mother=" + mother + "&applicant=" + applicant + "&date=" + date;

    r = syncAjax(u);

    return r.board.id;
}

function addNewGaurdian() {

//    var guardianId = 0;

    var gaurdianFname = $("#gidfname").val();
    var gaurdianMname = $("#gidmname").val();
    var guardianLname = $("#gidlname").val();
    var realtionship_id = $("#relaltionship_select").val();
    var occupation = $("#guardianOccupation").val();
    var res_address = $("#res_add_textarea").val();
    var post_address = $("#postal_add_textarea").val();
    var house_num = $("#homeNumber").val();
    var off_num = $("#officeNumber").val();
    var mob_num = $("#mobileNumber").val();
    var email_add = $("#email_input").val();

    var u = "student_list_action.php?cmd=9&relationship_id=" + realtionship_id + "&fname=" + gaurdianFname + "&mname=" + gaurdianMname + "&lname=" + guardianLname + "&occupation=" + occupation + "&res_address=" + res_address + "&post_address=" + post_address + "&house_num=" + house_num + "&off_num=" + off_num + "&mob_num=" + mob_num + "&email_add=" + email_add;
//    prompt("url", u);
    r = syncAjax(u);

//    prompt("Gaurdian Added", r.guardian.firstname + " " + r.guardian.lastname);

    return r.guardian.id;
}
//makes asynchronous call to the save page
function save() {
    //complete the url
//    var vtop = document.getElementById("topic").value;

    var onBus = $("#noOfPassengers").val();
    var reserved = $("#noOfResSeats").val();

    var id = 1;

    var u = "queries_action.php?cmd=" + 1 + "&onbus=" + onBus + "&reserved=" + reserved;
//alert(u);
//prompt("Copy to clipboard: Ctrl+C, Enter", u);
    r = syncAjax(u);

}

function feedback(data) {
    $("#divStatus").text(data);
    $("#divStatus").css({'color': 'yellow'});
}

function del(obj, id) {
    // cancel so you can load up a previous form
    cancel();
    var r = getHealthPromo(id);

    if (r.result == 0) {
        //show error message
        return;
    }
    //show the form
    //find where the user clicked and store it in x and y
    var y = event.clientY;
    var x = event.clientX / 1.5;
    //use x and y to set the location of the form based on mouse position
    $("#divDel").css("top", y);
    $("#divDel").css("left", x);
    //display the form
    $("#divDel").fadeIn(250);

    globalVar = id;
    spanVarPar = $(obj).closest("tr");
}

function rem() {
    // spanVarPar represents that hightlighted row
    spanVarPar.remove();

    var u = "health_promotion_action.php?cmd=3&idhp=" + globalVar;
    r = syncAjax(u);
    cancel();
    $("#divStatus").text("Health Promotion: \"" + r.topic + "\" deleted!");
    $("#divStatus").css({'color': 'yellow'});
}

function add(obj) {
    cancel();
    globalAddObj = obj;
    globalVar = 0;
    //get the data from JSON object r and get the respective attributes from the object and load into the form
    $("#topic").prop("value", "");                        //       alert("topoc: "+r.promotion.topic);
    $("#method").prop("value", "");                       //      alert("alert"+r.promotion.method);
    $("#venue").prop("value", "");                          //     alert("alert"+r.promotion.venue);
    $("#date").prop("value", "1990-01-01");                            //     alert("alert"+r.promotion.date);
    $("#target_audience").prop("value", "");         //  alert("alert"+r.promotion.target_audience);
    $("#number_of_audience").prop("value", 0);   //  alert("alert"+r.promotion.number_of_audience);
    $("#remarks").prop("value", "");                         //  alert("alert"+r.promotion.remarks);
    $("#month option[value=" + "January" + "]").prop('selected', true);
    $("#latitude").prop("value", 0);                       //  alert("alert"+r.promotion.latitude);
    $("#longitude").prop("value", 0);                    //   alert("alert"+r.promotion.longitude);
    $("#image").prop("value", "");                            //   alert("alert"+r.promotion.image);
    $("#subdistrict").prop("value", "1");            //    alert("alert"+r.promotion.subdistrict_id);
    $("#idcho").prop("value", "1");                          //    alert("alert"+r.promotion.cho_id);

    var y = event.clientY;
    var x = event.clientX / 2;

    $("#divEdit").css("top", y);
    $("#divEdit").css("left", x);
    $("#divEdit").fadeIn(250);
}

//hides the form
function cancel() {
    $(".fieldMine > input").prop('disabled', true);
    $(".fieldMine > textarea").prop('disabled', true);
    $(".fieldMine > select").prop('disabled', true);

    //fade out the form in half a second
    $("#divEdit").fadeOut(250);
    $("#divDel").fadeOut(250);
    $("#divQuickView").fadeOut(250);
}

function logOut() {
    var url = "logout.php";
//                r = syncAjax(u);
    window.open(url, "_self");
}
//        </script>


var currentdate = new Date();
//                                                    var startDatetime = "2014-07-11 00:00:00";
var startDatetime = currentdate.getFullYear() + "-"
        + (currentdate.getMonth() + 1) + "-"
        + currentdate.getDate() + " "
        + "00" + ":"
        + "00" + ":"
        + "00";
var date = currentdate.getDate();
if (date < 10) {
    date = "0" + date;
}

var month = (currentdate.getMonth() + 1);
if (month < 10) {
    month = "0" + month;
}

var year = currentdate.getFullYear();
if (year < 10) {
    year = "0" + year;
}

var hours = currentdate.getHours();
if (hours < 10) {
    hours = "0" + hours;
}

var mins = currentdate.getMinutes();
if (mins < 10) {
    mins = "0" + mins;
}

var secs = currentdate.getSeconds();
if (secs < 10) {
    secs = "0" + secs;
}

var datetime = year + "-"
        + month + "-"
        + date + " "
        + hours + ":"
        + mins + ":"
        + secs;