<?php include_once ('../includes/header.php'); ?>

<?php include_once ('topbar.php');

$view = $_GET['view'];






$sql = "SELECT * FROM  vehicles WHERE veh_id = $view";
$result = $conn->query($sql);

$row = $result->fetch_assoc();

$veh_id = $row["veh_id"];
$make = $row["vehicle_make"];
$model = $row["vehicle_model"];
$year = $row["vehicle_year"];
$used_new = $row["used_new"];
$main_color = $row["main_color"];
$secondary_color = $row["secondary_color"];
$engine_number = $row["engine_number"];
$odometer_reading = $row["odometer_reading"];
$seating_capacity = $row["seating_capacity"];
$fuel_type = $row["fuel_type"];
$add_info = $row["add_info"];
$plate_number = $row["plate_number"];
$date_registered = $row["date_registered"];
$status = $row["status"];





?>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Content Row -->
        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-9 col-lg-9">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Your Vehicle Information</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header font-weight-bold">RPTNo:00<?php echo $view; ?></div>
                                    <div class="card-body">

                                        <table class="table table-sm">
                                            <thead>
                                            <?php
                                                echo "<tr><th scope='col'>#: </th> <td>VHO$veh_id</td></tr>";
                                                echo "<tr><th scope='col'>Make: </th> <td>$make</td></tr>";
                                                echo "<tr><th scope='col'>Model: </th> <td>$model</td></tr>";
                                                echo "<tr><th scope='col'>Year: </th> <td>$year</td></tr>";
                                                echo "<tr><th scope='col'>Used / New: </th> <td>$used_new</td></tr></tr>";
                                                echo "<tr><th scope='col'>Main Color: </th> <td>$main_color</td></tr></tr>";
                                                echo "<tr><th scope='col'>Secondary Color: </th> <td>$secondary_color</td></tr>";
                                                echo "<tr><th scope='col'>Engine Number: </th> <td>$engine_number</td></tr>";
                                                echo "<tr><th scope='col'>Odometer Reading: </th> <td>$odometer_reading</td></tr>";
                                                echo "<tr><th scope='col'>Seating Capacity: </th> <td>$seating_capacity</td></tr>";
                                                echo "<tr><th scope='col'>Fuel Type: </th> <td>$fuel_type</td></tr>";
                                                echo "<tr><th scope='col'>Add Info: </th> <td>$add_info</td></tr>";
                                                echo "<tr><th scope='col'>Plate Number: </th> <td class='text-danger font-weight-bold'>$plate_number</td></tr>";
                                            echo "<tr><th scope='col'>Date Registered: </th> <td>$date_registered</td></tr>";
                                            echo "<tr><th scope='col'>Status: </th> <td class='font-weight-bold text-warning'>$status</td></tr>";


                                            ?>
                                            </thead>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h6 class="font-weight-bolder">Request For New Plates</h6>
                                <ul class="list-group">
                                    <?php
                                    if(isset($_POST['submit'])){
                                        $reason = $conn -> real_escape_string($_POST['reason']);

                                            $sql = "INSERT INTO request (veh_id, owner_id, reason, date)
                                                VALUES ('{$veh_id}','{$_SESSION['owner_id']}','{$reason}',now())";

                                            if ($conn->query($sql) === TRUE) {
                                                echo "<h4 style='background-color: green' class='alert text-white alert-success'>Your was successful send</h4>";
                                            }else {
                                                echo "Error: " . $sql . "<br>" . $conn->error;
                                            }
                                        }

                                    ?>

                                    <form action="" method="post">
                                        <input type="hidden" name="veh_id" value="<?php echo $veh_id ?>">
                                        <div class="form-group">
                                            <input type="text" name="reason" class="form-control" placeholder="Reason:">
                                        </div>
                                        <div class="mt-3">
                                            <button type="submit" name="submit" class="btn btn-danger float-right">Request</button>
                                        </div>
                                    </form>
                                </ul>
                            </div>
                        </div>



                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

<?php include_once ('../includes/footer.php'); ?>