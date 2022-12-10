<?php include_once ('../includes/header.php'); ?>

<?php include_once ('topbar.php'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-10 col-lg-10">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Talk with others</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">

                        <?php
                        if(isset($_POST['submit'])){

                            $description = $conn -> real_escape_string($_POST['description']);

                            $sql = "INSERT INTO communication (pat_id, description, date)
                            VALUES ('{$_SESSION['pat_id']}', '{$description}',now())";

                            if ($conn->query($sql) === TRUE) {

                                echo "<h4 class='alert alert-success'>Message sent</h4>";

                            }else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                        }

                        ?>

                        <form action="" method="post">
                            <div class="form-group">
                                <textarea class="form-control" name="description" rows="3"></textarea>
                            </div>
                            <button type="submit" name="submit" class="btn btn-warning btn-sm">Send</button>
                        </form>

                        <div class="card-body">
                            <div class="border border-dark">
                                <ul class="list-group">
<?php
$sql = "SELECT * FROM communication JOIN vehicle_owners ON communication.pat_id = vehicle_owners.pat_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        $comm_id = $row["comm_id"];
        $description = $row["description"];
        $full_names = $row["full_names"];
        $date = $row["date"];
        ?>
                                    <li class="list-group-item">
                                        <small><?php echo $date ?></small>
                                        <p <b class="font-weight-bold "><?php echo $full_names ?>:</b> <?php echo $description ?> </p>
                                    </li>
        <?php
    }
} else {
    echo "0 results";
}
?>

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