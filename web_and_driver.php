<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bus Administrator</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/mycss.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div id="wrapper">

                <div id="page-wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Bus Information</h1>
                        </div>
                    </div>
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-md-6">
                                    <label>No of Passengers on Bus</label>
                                </div>
                                <div class="col-md-6">
                                    <?php
                                    include_once './queries.php';
                                    $queries = new queries();
                                    $queries->get_data_on_load();
                                    $row_queries = $queries->fetch();
                                    
                                    ?>
                                    <input type="number" value=<?php
                                        print $row_queries['onbus'];
                                    ?> class="form-control" id="noOfPassengers" placeholder="30"/>
                                </div>
                                <!--</div>-->
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-md-6">
                                    <label>Total Number of Seats</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="number" value= <?php
                                        print $row_queries['totalseats'];
                                    ?> class="form-control" id="noOfSeats" placeholder="30" disabled/>
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="col-md-6">
                                    <label>Number of Reserved Seats</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="number" value=<?php
                                        print $row_queries['reserved'];
                                    ?> class="form-control" id="noOfResSeats" placeholder="30"/>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-xs-6 col-md-2">
                                <input class="btn btn-success" type="button" value="SAVE" onclick="save()" >
                            </div>
                            <div class="col-xs-6 col-md-2">
                                <input class="btn btn-warning" type="button" value="Clear" onclick="empty()" >
                            </div>
                        </div>
                        <br>
                        <br>
                    </form>
                    <!--</div>-->
                </div>
                <!-- /#page-wrapper -->
            </div>
            <!-- /#wrapper -->
        </div>
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/myjs.js"></script>
    </body>

</html>
