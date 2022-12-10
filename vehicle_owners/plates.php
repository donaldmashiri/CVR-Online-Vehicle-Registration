<?php include_once ('../includes/header.php'); ?>

<?php include_once ('topbar.php');
$delete = $_GET['delete'];
if (isset($_GET['delete'])) {

    $delete = $_GET['delete'];

    $query = "DELETE FROM vehicles WHERE veh_id = $delete ";

    $delete_query = mysqli_query($conn, $query);
    if (!$delete_query) {
        die("Query failed" . mysqli_error($conn));
    }
}


?>

    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-9 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Plates Vehicle</h6>
                        <a class="btn btn-primary justify-content-end" href="register_vehicle.php">Add New</a>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <table class="table table-bordered table-sm">
                            <thead>
                            <tr>
                                <th scope='col'>#: </th>
                                <th scope='col'>Make: </th>
                                <th scope='col'>Model: </th>
                                <th scope='col'>Year: </th>
                                <th scope='col'>Used / New: </th>
                                <th scope='col'>Plate Number: </th>
                                <th scope='col'>Reason: </th>
                                <th scope='col'>Req Status: </th>
                                <th scope='col'></th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            $sql = "SELECT * FROM  request JOIN vehicles ON request.veh_id = vehicles.veh_id WHERE request.owner_id = '{$_SESSION['owner_id']}' ";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    $owner_id = $row["owner_id"];
                                    $veh_id = $row["veh_id"];
                                    $reason = $row["reason"];
                                    $req_status = $row["req_status"];
                                    $date = $row["date"];
                                    $first_name = $row["first_name"];
                                    $last_name = $row["last_name"];
                                    $make = $row["vehicle_make"];
                                    $model = $row["vehicle_model"];
                                    $year = $row["vehicle_year"];
                                    $used_new = $row["used_new"];
                                    $plate_number = $row["plate_number"];
                                    $date_registered = $row["date_registered"];
                                    $status = $row["status"];

                                    ?>

                                    <tr>
                                        <td>VH00<?php echo $veh_id ?></td>
                                        <td><?php echo $make ?></td>
                                        <td><?php echo $model ?></td>
                                        <td><?php echo $year ?></td>
                                        <td><?php echo $used_new ?></td>
                                        <td><?php echo $plate_number ?></td>
                                        <td><?php echo $reason ?></td>
                                        <td><?php echo $req_status ?></td>

                                    </tr>

                                    <?php
                                }
                            } else {
                                echo "<p class='alert alert-danger'>You dont have request for new plates</p>";
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