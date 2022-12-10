<?php include_once ('../includes/header.php'); ?>

<?php include_once ('topbar.php'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Your Registered Vehicle</h6>
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
                                <th scope='col'>Date Registered: </th>
                                <th scope='col'>Status: </th>
                                <th scope='col'>Amount to be Paid: </th>
                                <th scope='col'>Amount : </th>
                                <th scope='col'></th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            $sql = "SELECT * FROM vehicles WHERE owner_id = '{$_SESSION['owner_id']}'";
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
                                    $plate_number = $row["plate_number"];
                                    $date_registered = $row["date_registered"];
                                    $amount_status = $row["amount_status"];
                                    $status = $row["status"];

                                    ?>

                                    <tr>
                                        <td>VH00<?php echo $veh_id ?></td>
                                        <td><?php echo $make ?></td>
                                        <td><?php echo $model ?></td>
                                        <td><?php echo $year ?></td>
                                        <td><?php echo $used_new ?></td>
                                        <td><?php echo $plate_number ?></td>
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
                                        <td><?php echo "$100.00" ?></td>
                                        <td>
                                            <?php
                                            if ($amount_status === "not paid") {
                                                echo "<p class='text-danger'> $amount_status </p>";
                                            }
                                            else {
                                                echo "<p class='text-success font-weight-bolder'> $amount_status </p>";
                                            }?>
                                        </td>
                                        <td>
                                            <?php if($status === 'plates ready for collection'){ ?>
                                            <form action="pay.php" method="post">
                                                <input type="hidden" name="veh_id" value="<?php echo $veh_id ?>">
                                                <button type="submit" name="pay" class="btn btn-primary btn-sm">Pay</button>
                                            </form>
                                        <?php } ?>
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