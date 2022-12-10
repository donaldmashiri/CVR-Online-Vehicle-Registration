<?php include('nav.php') ?>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <h3 style="color: black" class="font-weight-bolder text-center mt-2">
                    AUTOMATED INTEGRATED VEHICLE ADMINISTRATION SYSTEM FOR CENTRAL VEHICLE REGISTRATION </h3>
                    <div class="card-body p-0">
                        <div class="text-center">
                            <img src="img/coat.jpeg" class="rounded" width="300" height="190"  alt="">
                        </div>
                        <div class="row">
                            <div class="col-lg-12 d-none d-lg-block">
                               <div class="card m-3 p-3">
                               <div class="card-header"><h5 style="color: black" class="font-weight-bolder text-center">
                                Vehicle Owner Login
                                    </h5></div>
                                    <div class="card-body">
                                    <div class="p-1">
                                    <?php
                                    if(isset($_POST['login'])){
                                        $email = $_POST['email'];
                                        $password = $_POST['password'];

                                        $query = "select * from vehicle_owners where email = '$email' and password = '$password'";
                                        $result = mysqli_query($conn, $query);
                                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                        $count = mysqli_num_rows($result);

                                        if ($count == 1) {
                                            $_SESSION['owner_id'] = $row['owner_id'];
                                            header('location: vehicle_owners/index.php');

                                        } else {
                                            echo "<p style='background-color: red' class='alert text-white alert-danger'>Incorrect Password</p>";
                                        }
                                    }
                              
                                    ?>

                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                   id="MsuEmail" aria-describedby="emailHelp"
                                                   placeholder="Enter Email Address..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                   id="MsuPassword" minlength="4" placeholder="Password" required>
                                        </div>
                                        <button type="submit" name="login" class="btn btn-dark btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                   <div class="text-center mt-1">
                                       <a class="" href="register.php">Create Account</a>
                                   </div>
                                    <hr>
                                </div>
                                    </div>
                               </div>
                                <div class="float-right m-2">
                                    <a target="_blank" class="btn btn-primary" href="admin">Administration</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>