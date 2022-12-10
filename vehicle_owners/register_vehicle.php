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
                        <h6 class="m-0 font-weight-bold text-primary">Registered Vehicle</h6>
                        <a class="btn btn-secondary justify-content-end" href="your_vehicles.php">Back</a>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">

                        <?php
                        if(isset($_POST['submit'])){

                            $vehicle_make = $conn -> real_escape_string($_POST['vehicle_make']);
                            $vehicle_model = $conn -> real_escape_string($_POST['vehicle_model']);
                            $vehicle_year = $conn -> real_escape_string($_POST['vehicle_year']);
                            $used_new = $conn -> real_escape_string($_POST['used_new']);
                            $main_color = $conn -> real_escape_string($_POST['main_color']);
                            $secondary_color = $conn -> real_escape_string($_POST['secondary_color']);
                            $engine_number = $conn -> real_escape_string($_POST['engine_number']);
                            $odometer_reading = $conn -> real_escape_string($_POST['odometer_reading']);
                            $seating_capacity = $conn -> real_escape_string($_POST['seating_capacity']);
                            $fuel_type = $conn -> real_escape_string($_POST['fuel_type']);
                            $add_info = $conn -> real_escape_string($_POST['add_info']);

                            $sql = "SELECT * FROM vehicles WHERE engine_number = '$engine_number'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                echo "<h4 style='background-color: lightcoral' class='alert alert-dark text-white text-center'>The Engine Number already exists</h4>";
                            }else{
                                $sql = "INSERT INTO vehicles (owner_id, vehicle_make, vehicle_model, vehicle_year, used_new, main_color, secondary_color, engine_number, odometer_reading, seating_capacity, fuel_type, add_info, date_registered)
                                VALUES ({$_SESSION['owner_id']},'{$vehicle_make}', '{$vehicle_model}', '{$vehicle_year}', '{$used_new}',
                                       '{$main_color}', '{$secondary_color}', '{$engine_number}', {$odometer_reading}, {$seating_capacity}, '{$fuel_type}', '{$add_info}', now())";

                                if ($conn->query($sql) === TRUE) {

                                    echo "<h4 class='alert alert-success'>Your Registration Was successfull</h4>";

                                }else {
                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                }
                            }
                        }
                        ?>

                        <form class="font-weight-bolder" action="" method="post">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="title">Make</label>
                                        <input type="text" name="vehicle_make" class="form-control" placeholder="" minlength="4" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="title">Model</label>
                                        <input type="text" name="vehicle_model" class="form-control" placeholder="" minlength="4" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="title">Year</label>
                                        <input type="number" name="vehicle_year" class="form-control" placeholder="" min="2007" max="2022" minlength="4" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="title">Is the Vehicle New or Used Vehicle?</label>
                                        <select class="form-control" name="used_new" id="">
                                            <option value="new">New</option>
                                            <option value="used">Used</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="title">Main Color</label>
                                        <select class="form-control" name="main_color" id="">
                                            <option style="background-color: white"  value="white">White</option>
                                            <option style="background-color: yellow" value="yellow">Yellow</option>
                                            <option style="background-color: blue" value="blue">Blue</option>
                                            <option style="background-color: red" value="red">Red</option>
                                            <option style="background-color: green; color: white" value="green">Green</option>
                                            <option style="background-color: black" value="black">Black</option>
                                            <option style="background-color: brown" value="brown">Brown</option>
                                            <option style="background-color: azure" value="azure">Azure</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="title">Secondary Color</label>
                                        <select class="form-control" name="secondary_color" id="">
                                            <option style="background-color: white"  value="white">White</option>
                                            <option style="background-color: yellow" value="yellow">Yellow</option>
                                            <option style="background-color: blue" value="blue">Blue</option>
                                            <option style="background-color: red" value="red">Red</option>
                                            <option style="background-color: green; color: white" value="green">Green</option>
                                            <option style="background-color: black" value="black">Black</option>
                                            <option style="background-color: brown" value="brown">Brown</option>
                                            <option style="background-color: azure" value="azure">Azure</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Engine Number</label>
                                        <input type="text" name=engine_number class="form-control" placeholder="" minlength="7" maxlength="14" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Odometer Reading</label>
                                        <input type="text" name="odometer_reading" class="form-control" placeholder="" minlength="4" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="title">Seating Capacity</label>
                                        <input type="number" name="seating_capacity" class="form-control" placeholder="" min="2" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="title">Fuel Type</label>
                                        <input type="text" name="fuel_type" class="form-control" placeholder="Fuel Type" minlength="4" required>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="title">Additional Description Or Information</label>
                                        <textarea class="form-control" name="add_info" id="" cols="15" rows="5"></textarea>
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
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

<?php include_once ('../includes/footer.php'); ?>