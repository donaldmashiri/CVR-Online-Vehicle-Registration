<?php include_once ('../includes/header.php'); ?>

<?php include_once ('topbar.php'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                 
                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Profile Details</h6>
                                   
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <table class="table table-sm">
                                        <thead>
                                        <?php
                                        $sql = "SELECT * FROM vehicle_owners WHERE owner_id = '{$_SESSION['owner_id']}'";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while($row = $result->fetch_assoc()) {

                                                echo "<tr><th scope='col'>PAT#: </th> <td>CVRVO$owner_id</td></tr>";
                                                echo "<tr><th scope='col'>First name: </th> <td>$first_name</td></tr>";
                                                echo "<tr><th scope='col'>Last name: </th> <td>$last_name</td></tr>";
                                                echo "<tr><th scope='col'>Email: </th> <td>$email</td></tr>";
                                                echo "<tr><th scope='col'>National_ID: </th> <td>$national_id</td></tr></tr>";
                                                echo "<tr><th scope='col'>Date Of Birth: </th> <td>$dob</td></tr></tr>";
                                                echo "<tr><th scope='col'>Address: </th> <td>$address</td></tr>";
                                            }
                                        } else {
                                            echo "<p class='alert alert-danger'>No user Found</p>";
                                        }
                                        ?>
                                        </thead>
                                    </table>
                                    <div class="card-footer">
                                        <a href="edit.php?edit=<?php echo $owner_id ?>" class="btn btn-success">Edit Your details</a>
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