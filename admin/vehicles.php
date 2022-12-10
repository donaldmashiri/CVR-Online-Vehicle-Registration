<?php include_once ('../includes/header.php'); ?>

<?php include_once ('topbar.php'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-10 col-lg-9">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">All Vehicles Registered</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <table class="table table-bordered table-sm">
                            <thead>
                            <tr>
                                <th scope='col'>#: </th>
                                <th scope='col'>Owner Names: </th>
                                <th scope='col'>Make: </th>
                                <th scope='col'>Model: </th>
                                <th scope='col'>Year: </th>
                                <th scope='col'>Used / New: </th>
                                <th scope='col'>Main Color: </th>
                                <th scope='col'>Secondary Color: </th>
                                <th scope='col'>Engine Number: </th>
                                <th scope='col'>Date Registered: </th>
                                <th scope='col'>Status: </th>
                                <th scope='col'></th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            $sql = "SELECT * FROM vehicles JOIN vehicle_owners ON vehicles.owner_id = vehicle_owners.owner_id";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    $owner_id = $row["owner_id"];
                                    $veh_id = $row["veh_id"];
                                    $first_name = $row["first_name"];
                                    $last_name = $row["last_name"];
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

                                    <tr>
                                        <td>VH00<?php echo $veh_id ?></td>
                                        <td><?php echo $first_name .' '. $last_name ?></td>
                                        <td><?php echo $make ?></td>
                                        <td><?php echo $model ?></td>
                                        <td><?php echo $year ?></td>
                                        <td><?php echo $used_new ?></td>
                                        <td><?php echo $main_color ?></td>
                                        <td><?php echo $secondary_color ?></td>
                                        <td><?php echo $engine_number ?></td>
                                        <td><?php echo $date_registered ?></td>
                                        <td>
                                            <?php
                                                if ($status === "rejected") {
                                                    echo "<p class='text-danger'> $status </p>";
                                                }elseif($status === "responded") {
                                                    echo "<p class='text-success'> $status </p>";
                                                }
                                                else {
                                                    echo "<p class='text-info'> $status </p>";
                                                }?>
                                        <td>
                                            <a href="veh.php?veh=<?php echo $veh_id ?>" class="btn btn-info btn-sm">view</a>
                                        </td>
                                    </tr>

                                    <?php
                                }
                            } else {
                                echo "0 results";
                            }
                            ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

<?php include_once ('../includes/footer.php'); ?>