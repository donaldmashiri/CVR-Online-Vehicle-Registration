<?php include_once ('../includes/header.php'); ?>

<?php include_once ('topbar.php'); ?>

<?php
$view = $_GET['veh'];

if (isset($_POST['approve'])) {

    $veh_id = $_POST['veh_id'];
    $plate = $_POST['plate'];
    $status = "plates ready for collection";

    $query = "select * from vehicles WHERE plate_number = '$plate'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($count >= 1) {
        $msg = "<p class='alert alert-danger'>Number Plate already taken</p>";
    }else{
        $query = "UPDATE vehicles SET ";
        $query .= "plate_number  = '{$plate}', ";
        $query .= "status  = '{$status}' ";
        $query .= "WHERE veh_id = $view ";

        $update_query = mysqli_query($conn, $query);
        if (!$update_query) {
            die("Query failed" . mysqli_error($conn));
        }
    }




}

if (isset($_POST['reject'])) {

    $veh_id = $_POST['veh_id'];
    $plate = '----';
    $status = "rejected";

    $query = "UPDATE vehicles SET ";
    $query .= "plate_number  = '{$plate}', ";
    $query .= "status  = '{$status}' ";
    $query .= "WHERE veh_id = $view ";

    $update_query = mysqli_query($conn, $query);
    if (!$update_query) {
        die("Query failed" . mysqli_error($conn));
    }
}

$sql = "SELECT * FROM vehicles JOIN vehicle_owners ON vehicles.owner_id = vehicle_owners.owner_id WHERE veh_id = '{$view}'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $owner_id = $row["owner_id"];
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
        $first_name = $row["first_name"];
        $last_name = $row["last_name"];
        $email = $row["email"];
        $address = $row["address"];
        $national_id = $row["national_id"];
        $dob = $row["dob"];
        $date = $row["date"];
    }
}



?>


    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-7 col-lg-6">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">View Vehicle</h6>
                    </div>
                    <!-- Card Body -->

                    <div class="card-body">
                        <?php


                        ?>
                        <div class="row">
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
                                echo "<tr><th scope='col'>Status: </th> <td class='font-weight-bold'>";
                                if ($status === "pending") {
                                    echo "<p class='text-warning'> $status </p>";
                                }elseif ($status === "rejected"){
                                    echo "<p class='text-danger font-weight-bolder'> $status </p>";
                                }
                                else {
                                    echo "<p class='text-success font-weight-bolder'> $status </p>";
                                }
                                echo "</td></tr>";

                                ?>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-6">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Vehicle Owner Details</h6>
                    </div>
                    <!-- Card Body -->

                    <div class="card-body">
                        <div class="row">
                            <table class="table table-sm">
                                <thead>
                                <?php
                                echo "<tr><th scope='col'>#: </th> <td>VO$owner_id</td></tr>";
                                echo "<tr><th scope='col'>First Name: </th> <td>$first_name</td></tr>";
                                echo "<tr><th scope='col'>Last Name: </th> <td>$last_name</td></tr>";
                                echo "<tr><th scope='col'>Email: </th> <td>$email</td></tr>";
                                echo "<tr><th scope='col'>Address: </th> <td>$address</td></tr></tr>";
                                echo "<tr><th scope='col'>National ID: </th> <td>$national_id</td></tr></tr>";
                                echo "<tr><th scope='col'>DOB: </th> <td>$dob</td></tr>";
                                ?>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                           <div>
                               <?php if($status === 'pending' OR $status === 'rejected'){
                                   echo $msg;
                                   ?>

                               <form action="" method="post">
                                   <input type="hidden" name="veh_id" value="<?php echo $veh_id ?>">
                                   <div class="form-group">
                                       <input type="text" name="plate" class="form-control" required minlength="5" placeholder="Give Plate Number:">
                                   </div>
                                   <button type="submit" name="approve" class="btn btn-success">Verify</button>
                                   <button type="submit" name="reject" class="btn btn-danger">Reject</button>
                               </form>
                               <?php }else{
                                   echo "<h4 class='alert alert-info'>Decision Already Made</h4>";
                               } ?>
                           </div>
                        </div>
                    </div>
                </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
<?php include_once ('../includes/footer.php'); ?><?php
