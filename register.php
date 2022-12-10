<?php include('nav.php') ?>

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="text-center">
                    <h3 style="color: black" class="font-weight-bolder text-center m-3">
                    AUTOMATED INTEGRATED VEHICLE ADMINISTRATION SYSTEM FOR CENTRAL VEHICLE REGISTRATION </h3>
                        <div class="text-center">
                            <img src="img/coat.jpeg" class="rounded" width="300" height="190"  alt="">
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-12 d-none d-lg-block">
                            <div class="p-1">
                                <?php
                                if(isset($_POST['submit'])){
                                    $first_name = $conn -> real_escape_string($_POST['first_name']);
                                    $last_name = $conn -> real_escape_string($_POST['last_name']);
                                    $email = $conn -> real_escape_string($_POST['email']);
                                    $national_id = $conn -> real_escape_string($_POST['national_id']);
                                    $dob = $conn -> real_escape_string($_POST['dob']);
                                    $address = $conn -> real_escape_string($_POST['address']);
                                    $password = $conn -> real_escape_string($_POST['password']);
                                    $cpassword = $conn -> real_escape_string($_POST['cpassword']);

                                    $date =date("Y-m-d");
                                    $e_date =  date('Y-m-d', strtotime($date. ' - 18 years'));

                                    if($dob < $e_date) {
                                        if($password === $cpassword){
                                            $sql = "INSERT INTO vehicle_owners (first_name, last_name, email, address, national_id, dob, password, date)
                            VALUES ('{$first_name}','{$last_name}','{$email}', '{$address}','{$national_id}','{$dob}','{$password}',now())";

                                            if ($conn->query($sql) === TRUE) {
                                                echo "<h4 style='background-color: green' class='alert text-white alert-success'>Your Account Was successfully created</h4>";
                                            }else {
                                                echo "Error: " . $sql . "<br>" . $conn->error;
                                            }
                                        }else{
                                            echo "<h4 style='background-color: red' class='alert alert-dark text-white text-center'>Password did not match</h4>";
                                        }
                                    }elseif($dob > $e_date){
                                        echo "<h4 class='alert alert-warning text-dark text-center'>Your Age not permitted you should be above 16 years</h4>";
                                    }else{
                                        echo "<h4 class='alert alert-warning text-dark text-center'>Your Age not allowed you should be above 16 years</h4>";
                                    }


                                }

                                ?>

                                <div class="card m-3">
                                <div class="card-header"><h5 style="color: black" class="font-weight-bolder text-center">
                                Vehicle Owner Account Creation
                                    </h5></div>
                                   
                                    <div class="card-body">
                                    <form action="" method="post">
                                    <div class="mb-3">
                                        <label for="fname" class="form-label">First Name</label>
                                        <input type="text" name="first_name" class="form-control" id="fname" aria-describedby="emailHelp" minlength="4" required">
                                    </div>
                                    <div class="mb-3">
                                        <label for="fname" class="form-label">Last Name</label>
                                        <input type="text" name="last_name" class="form-control" id="fname" aria-describedby="emailHelp" minlength="4" required">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" minlength="4" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="number" class="form-label">National ID</label>
                                        <input type="text" name="national_id" class="form-control" id="number" aria-describedby="emailHelp" minlength="4" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="number" class="form-label">Date Of Birth</label>
                                        <input type="date" name="dob" class="form-control" id="number" aria-describedby="emailHelp" minlength="4" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="number" class="form-label">Address</label>
                                        <textarea name="address" class="form-control" id="" cols="5" rows="3" minlength="4" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pwd" class="form-label">Password</label>
                                        <input type="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,12}$" title="Min. of At least 1 digits, 1 Capital Letter and min. 6 letters are required" name="password" class="form-control" id="pwd" minlength="4"
                                               required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pwd" class="form-label">Confirm Password</label>
                                        <input type="password" name="cpassword" class="form-control" id="pwd">
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                </form>
                                    </div>
                                </div>

                                <p class="text-center"> Have an Account <a href="index.php">login</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="js/val.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>

</html>