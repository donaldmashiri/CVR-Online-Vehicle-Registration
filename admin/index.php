<?php include_once ('../includes/header.php'); ?>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <h3 style="color: black" class="font-weight-bolder text-center mt-2">
                        AUTOMATED INTEGRATED VEHICLE ADMINISTRATION SYSTEM FOR CENTRAL VEHICLE REGISTRATION </h3>
                    <div class="card-body p-0">
                        <div class="text-center">
                            <img src="../img/coat.jpeg" class="rounded" width="300" height="190"  alt="">
                        </div>
                        <h3 style="color: black" class="font-weight-bolder text-success text-center mt-2">
                            Administration </h3>
                        <div class="row">

                            <div class="col-lg-12 d-none d-lg-block">
                                <div class="p-1">
                                    <?php
                                    if(isset($_POST['admin_login'])){
                                        $password = $_POST['password'];

                                        if ($password === "12345") {
                                            header('location: home.php');
                                        } else {
                                            echo "<p class='alert alert-danger'>Incorrect credentials</p>";
                                        }
                                    }
                                    ?>

                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                   id="MsuPassword" placeholder="Password" required>
                                        </div>
                                        <button type="submit" name="admin_login" class="btn btn-success btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

<?php include_once ('../includes/footer.php'); ?>