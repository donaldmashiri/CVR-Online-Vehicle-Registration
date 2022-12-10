<?php include_once ('../includes/header.php'); ?>

<?php include_once ('topbar.php');

if (isset($_POST['submit'])) {

    $req_id = $_POST['req_id'];

    $query = "UPDATE request SET ";
    $query .= "req_status  = 'plates ready for collection' ";
    $query .= "WHERE req_id = $req_id ";

    $update_query = mysqli_query($conn, $query);
    if (!$update_query) {
        die("Query failed" . mysqli_error($conn));
    }
}


?>

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
                        <h6 class="m-0 font-weight-bold text-primary">Requested Number Plates</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <table class="table table-bordered table-sm">
                            <thead>
                            <tr>
                                <th scope='col'>#: </th>
<!--                                <th scope='col'>Owner Names: </th>-->
                                <th scope='col'>Make: </th>
                                <th scope='col'>Model: </th>
                                <th scope='col'>Year: </th>
                                <th scope='col'>Number Plate: </th>
                                <th scope='col'>Date Requested: </th>
                                <th scope='col'>Status: </th>
                                <th scope='col'></th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            $sql = "SELECT * FROM request JOIN vehicles ON vehicles.veh_id = request.veh_id";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    $req_id = $row["req_id"];
                                    $owner_id = $row["owner_id"];
                                    $veh_id = $row["veh_id"];
                                    $first_name = $row["first_name"];
                                    $last_name = $row["last_name"];
                                    $make = $row["vehicle_make"];
                                    $model = $row["vehicle_model"];
                                    $year = $row["vehicle_year"];
                                    $used_new = $row["used_new"];
                                    $plate_number = $row["plate_number"];
                                    $date_registered = $row["date_registered"];
                                    $req_status = $row["req_status"];

                                    ?>

                                    <tr>
                                        <td>RQ00<?php echo $req_id ?></td>
<!--                                        <td>--><?php //echo $first_name .' '. $last_name ?><!--</td>-->
                                        <td><?php echo $make ?></td>
                                        <td><?php echo $model ?></td>
                                        <td><?php echo $year ?></td>
                                        <td class="font-weight-bolder text-danger"><?php echo $plate_number; ?></td>
                                        <td><?php echo $date_registered ?></td>
                                        <td>
                                            <?php
                                            if ($req_status === "rejected") {
                                                echo "<p class='text-danger'> $req_status </p>";
                                            }elseif($req_status === "responded") {
                                                echo "<p class='text-success'> $req_status </p>";
                                            }
                                            else {
                                                echo "<p class='text-info'> $req_status </p>";
                                            }?>
                                        <td>
                                            <form method="post" action="">
                                            <input type="hidden" name="req_id" value="<?php echo $req_id ?>">
                                            <button type="submit" name="submit" class="float-left mt-1 btn btn btn-success btn-sm">Accept</button>
                                        </form>
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