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

        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.js"></script>

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
                                    <label>No Of Passengers on bus</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" id="noOfPassengers" placeholder="30"/>
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
                                    <input type="number" class="form-control" id="noOfSeats" placeholder="30"/>
                                </div>
                            </div>

<!--                            <div class="col-xs-6 col-md-4">
                                <div class="col-md-4">
                                    <label>Nationality</label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control" id='nat'>
                                        <?php
//                                    include_once 'nationality.php';
//                                    $nationality = new nationality();
//                                    $nationality->get_all_nationalities();
//                                    $row_nationality2 = $nationality->fetch();
//                                    while ($row_nationality2) {
//                                        echo "<option value =" . $row_nationality2["nationality_id"] . ">" . $row_nationality2["nationality"] . "</option> ";
//                                        $row_nationality2 = $nationality->fetch();
//                                    }
//                                    
                                        ?>
                                    </select>
                                </div>
                            </div>-->
                        </div>

                        <br>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="col-md-6">
                                    <label>Number of Reserved Seats</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" id="noOfSeats" placeholder="30"/>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-xs-6 col-md-2">
                                <input class="btn btn-success" type="button" value="SAVE" onclick="addNewStudent()" >
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
    </body>

</html>
