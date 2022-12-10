<?php include_once ('../includes/header.php'); ?>

<?php include_once ('topbar.php');

$view = $_GET['view'];

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
                        <h6 class="m-0 font-weight-bold text-primary">Notifications</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header font-weight-bold">For Number Plates</div>
                                    <div class="card-body">

                                        <table class="table table-sm">
                                            <?php

                                            $sql = "SELECT * FROM  vehicles WHERE owner_id = '{$_SESSION['owner_id']}' AND status = 'plates ready for collection' ORDER BY veh_id DESC ";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while ($row = $result->fetch_assoc()) {
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
                                            <thead>
                                            <?php
                                            echo "<tr><th scope='col'>#: </th> <td>VHO$veh_id</td></tr>";
                                            echo "<tr><th scope='col'>Make: </th> <td>$make</td></tr>";
                                            echo "<tr><th scope='col'>Model: </th> <td>$model</td></tr>";
                                            echo "<tr><th scope='col'>Plate Number: </th> <td class='text-danger font-weight-bold'>$plate_number</td></tr>";
                                            echo "<tr><th scope='col'>Date Registered: </th> <td>$date_registered</td></tr>";
                                            echo "<tr><th scope='col'>Status: </th> <td class='font-weight-bold text-warning'>$status</td></tr>";
                                            echo "<hr/>";
                                            }

                                            }

                                            ?>
                                            </thead>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">Request For Lost Plates</div>
                                </div>
                                <?php


                                $sql = "SELECT * FROM  request  WHERE owner_id = '{$_SESSION['owner_id']}' AND req_status = 'plates ready for collection' ORDER BY req_id DESC ";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        $veh_id = $row["veh_id"];
                                        $veh_id = $row["veh_id"];
                                        $reason = $row["reason"];
                                        $req_status = $row["req_status"];
                                        $date = $row["date"];

                                ?>


                                <ul class="list-group">
                                    <li class="list-group-item active" aria-current="true">VH0<?php echo $veh_id ?></li>
                                    <li class="list-group-item">Reason : <?php echo $reason ?></li>
                                    <li class="list-group-item">Status : <?php echo $req_status ?></li>
                                    <li class="list-group-item"><?php echo $date ?></li>
                                </ul>
                                <?php }
                                } ?>
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