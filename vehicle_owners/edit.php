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
                        class="card-header bg-success py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-white">Edit Your Profile Details</h6>

                    </div>
                    <!-- Card Body -->
                    <?php
                    if(isset($_POST['submit'])){
                        $first_name = $conn -> real_escape_string($_POST['first_name']);
                        $last_name = $conn -> real_escape_string($_POST['last_name']);
                        $email = $conn -> real_escape_string($_POST['email']);
                        $national_id = $conn -> real_escape_string($_POST['national_id']);
                        $dob = $conn -> real_escape_string($_POST['dob']);
                        $address = $conn -> real_escape_string($_POST['address']);

                        $sql = "UPDATE vehicle_owners SET ";
                        $sql .= "first_name  = '{$first_name}', ";
                        $sql .= "last_name  = '{$last_name}', ";
                        $sql .= "email  = '{$email}', ";
                        $sql .= "national_id  = '{$national_id}', ";
                        $sql .= "dob  = '{$dob}', ";
                        $sql .= "address  = '{$address}' ";
                        $sql .= "WHERE owner_id = {$_SESSION['owner_id']} ";


                            if ($conn->query($sql) === TRUE) {
                                echo "<h4 style='background-color: green' class='alert text-white alert-success'>Your Details successfully updated</h4>";
                            }else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                    }

                    ?>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="fname" class="form-label">First Name</label>
                                <input type="text" name="first_name" value="<?php echo $first_name ?>" class="form-control" id="fname" aria-describedby="emailHelp" minlength="4" required">
                            </div>
                            <div class="mb-3">
                                <label for="fname" class="form-label">Last Name</label>
                                <input type="text" name="last_name" value="<?php echo $last_name ?>" class="form-control" id="fname" aria-describedby="emailHelp" minlength="4" required">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo $email ?>" id="email" aria-describedby="emailHelp" minlength="4" required>
                            </div>
                            <div class="mb-3">
                                <label for="number" class="form-label">National ID</label>
                                <input type="text" name="national_id" class="form-control" value="<?php echo $national_id ?>" id="number" aria-describedby="emailHelp" minlength="4" required>
                            </div>
                            <div class="mb-3">
                                <label for="number" class="form-label">Date Of Birth</label>
                                <input type="date" name="dob" class="form-control" value="<?php echo $dob ?>" id="number" aria-describedby="emailHelp" minlength="4" required>
                            </div>
                            <div class="mb-3">
                                <label for="number" class="form-label">Address</label>
                                <textarea name="address" class="form-control" id="" cols="5" rows="3" minlength="4" required><?php echo $address ?></textarea>
                            </div>
                            <button type="submit" name="submit" class="btn btn-warning float-right btn-lg">Update details</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

<?php include_once ('../includes/footer.php'); ?>