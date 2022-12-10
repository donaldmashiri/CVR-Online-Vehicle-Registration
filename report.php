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
                       
                    </div>
                    
                    <div class="row">
                    <div class="col-lg-12 d-none d-lg-block">
                            <div class="p-1">
                                
                                <?php

                                if(isset($_POST['submit'])){
                                    $make_model = $conn -> real_escape_string($_POST['make_model']);
                                    $colors = $conn -> real_escape_string($_POST['colors']);
                                    $add_description = $conn -> real_escape_string($_POST['add_description']);
                                    $how_stolen = $conn -> real_escape_string($_POST['how_stolen']);
                                    $date_stolen = $conn -> real_escape_string($_POST['date_stolen']);
                                    $ownership = $conn -> real_escape_string($_POST['ownership']);
                                    $contact_name = $conn -> real_escape_string($_POST['contact_name']);
                                    $phone_numbers = $conn -> real_escape_string($_POST['phone_numbers']);
                                    $feedback = $conn -> real_escape_string($_POST['feedback']);
                                    $engine_number = $conn -> real_escape_string($_POST['engine_number']);

                                $now = date("Y-m-d");

                                if($date_stolen <= $now) {
                                    $sql = "INSERT INTO reports (make_model, colors, add_description, how_stolen, date_stolen, ownership, contact_name, phone_numbers, engine_number)
                            VALUES ('{$make_model}','{$colors}','{$add_description}','{$how_stolen}', '{$date_stolen}','{$ownership}','{$contact_name}', '{$phone_numbers}', '{$engine_number}')";

                                    if ($conn->query($sql) === TRUE) {
                                        echo "<h4 style='background-color: green' class='alert text-white alert-success'>Your Report Case Was successfully sent</h4>";
                                    }else {
                                        echo "Error: " . $sql . "<br>" . $conn->error;
                                    }
                                }else{
                                    echo "<p class='alert text-white alert-danger'>In correct stolen date can not be greater than today </p>";

                                }


                                }
                                ?>

                                <div class="card m-3">
                                    <div class="card-header"><h5 style="color: black"  class="font-weight-bolder text-center">
                                        Report For Stolen Car
                                    </h5></div>
                                    <div class="card-body">
                                    <form action="" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="fname" class="form-label">Make and Model</label>
                                                    <input type="text" name="make_model" class="form-control" id="fname" aria-describedby="emailHelp" minlength="4" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="fname" class="form-label">Colors</label>
                                                    <input type="text" name="colors" class="form-control" id="fname" aria-describedby="emailHelp" minlength="2" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="fname" class="form-label">Engine Number</label>
                                                    <input type="text" name="engine_number" class="form-control" id="fname" aria-describedby="emailHelp" minlength="7" maxlength="14" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Additional Description Of The Car</label>
                                            <textarea class="form-control" name="add_description" id="" cols="5" rows="3"></textarea>
                                        </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">How The Car Was Stolen</label>
                                        <textarea class="form-control" name="how_stolen" id="" cols="5" rows="3"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="number" class="form-label">Date Stolen</label>
                                        <input type="date" name="date_stolen" class="form-control" id="number" aria-describedby="emailHelp" minlength="4" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pwd" class="form-label">Owner Ships</label>
                                        <select class="form-control" name="ownership" id="">
                                            <option value="owner">Owner</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="fname" class="form-label">Contact Name</label>
                                                    <input type="text" name="contact_name" class="form-control" id="fname" aria-describedby="emailHelp" minlength="4" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="fname" class="form-label">Phone Numbers</label>
                                                    <input type="number" name="phone_numbers" class="form-control" id="fname" aria-describedby="emailHelp" minlength="4" required>
                                                </div>
                                            </div>
                                        </div>
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                </form>
                                    </div>
                                </div>
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