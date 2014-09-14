<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once './gen.php';
include_once './queries.php';

$cmd = get_datan("cmd");
//$id = get_data("id");
//$date = get_data("date");
//$venue = get_data("venue");
//$page = get_datan("start");

switch ($cmd) {

    case 1:
        //get promotion based on idhealth promotion
        update_data();
        break;

    case 2:
        //get all promotions 
//        get_all_promotions();
        break;

    default:
        echo "{";
        echo jsonn("result", 0);
        echo ",";
        echo jsons("message", "not a recognised command");
        echo "}";
}

function update_data() {
    $reserved = get_datan('reserved');
    $onbus = get_datan('onbus');
    $p = new queries();
    $p->update_data($onbus, $reserved);

    if ($p) {
//        $p->fetch();
        echo "{";
        echo jsonn("result", 1) . ",";
        echo jsons("message", "retrieved") . ",";
        echo jsonn("reserved", $reserved). ",";
        echo jsonn("onbus", $onbus);
        echo "}";
        return;
    }

    echo "{";
    echo jsonn("result", 0) . ",";
    echo jsons("message", "error, no record retrieved");
    echo "}";
}
