<?php include_once ('../includes/header.php'); ?>

<?php include_once ('topbar.php'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Reports</h6>
<!--                        <a class="btn btn-secondary justify-content-end" href="your_vehicles.php">Back</a>-->
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <form action="" method="post">
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="title">Make / Model</label>
                                    <input type="text" name="makeormodel" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="title">New or Used Vehicle</label>
                                    <select class="form-control" name="usedornew" id="">
                                        <option value="new">New</option>
                                        <option value="used">Used</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 ">
                                   <button name="submit" type="submit" class="btn btn-primary mt-4">Search</button>
                            </div>

                                <?php

                                if(isset($_POST['submit'])) {

                                    $usedornew = $_POST['usedornew'];
                                    $makeormodel = $_POST['makeormodel'];

                                    $query = "SELECT * FROM vehicles WHERE used_new LIKE '%$usedornew%' AND vehicle_make LIKE '%$makeormodel%' OR vehicle_model LIKE '%$makeormodel%' ";

                                    $result = mysqli_query($conn, $query);
                                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                    $count = mysqli_num_rows($result);
                                        if ($count >= 1) {
                                            $veh_id = $row["veh_id"];
                                            $make = $row["vehicle_make"];
                                            $model = $row["vehicle_model"];
                                            $year = $row["vehicle_year"];
                                            $used_new = $row["used_new"];

                                            echo "<div class='col-md-6'> <ul class='list-group list-group-horizontal-sm'>
                  <li class='list-group-item bg-success text-white'>Vehicle is found</li> 
                  <li class='list-group-item'>Make :</span>  $make </li> 
                  <li class='list-group-item'>Mode(s) :</span>  $model </li> 
                  <li class='list-group-item'>Used / New :</span>  $used_new </li> 
                   <li class='list-group-item'>
<a href='veh.php?veh=$veh_id' class='btn btn-info'>view</a></li> 
                  ";
                                            echo "</ul></div>";

                                        } else {
                                            echo "<ul class='list-group '>
                  <li class='list-group-item bg-danger text-white'>Vehicle is  not found</li> 
               </ul>";
                                        }
                                    }

                                ?>

                        </div>
                        </form>
                        <hr>
                        <div class="row">
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Total Vehicle Owners</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php
                                                    $query = "SELECT count(*) FROM vehicle_owners";
                                                    $result = mysqli_query($conn, $query);
                                                    $row = mysqli_fetch_array($result);
                                                    echo $total_savings = $row[0];
                                                    ?> Vehicle Owners
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-users fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Total Vehicles</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php
                                                    $query = "SELECT count(*) FROM vehicles";
                                                    $result = mysqli_query($conn, $query);
                                                    $row = mysqli_fetch_array($result);
                                                    echo $total_savings = $row[0];
                                                    ?> Vehicles
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-car-side fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Total Registration Fee Paid</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">$ <?php
//                                                    $query = "SELECT sum(amount) FROM appointments  WHERE amt_status = 'paid'";
//                                                    $result = mysqli_query($conn, $query);
//                                                    $row = mysqli_fetch_array($result);
//                                                    echo "Total : $". $total_savings = $row[0];
                                                    echo "200"
                                                    ?>,00
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-dark shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                    Total reports Cases</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php
                                                    $sql = "SELECT count(*) AS total from reports";
                                                    $result = $conn->query($sql);
                                                    $data =  $result->fetch_assoc();
                                                    echo $data['total'];
                                                    ?> Stolen Cars
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-car fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-md-12 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    Total Approved Registered Vehicles</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php
                                                    $sql = "SELECT COUNT(*) AS total from vehicles WHERE status = 'registered'";
                                                    $result = $conn->query($sql);
                                                    $data =  $result->fetch_assoc();
                                                    echo $data['total'];
                                                    ?> Vehicle Approved
                                                </div>
                                            </div>
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Pending Registered Vehicles</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php
                                                    $sql = "SELECT COUNT(*) AS total from vehicles WHERE status = 'pending'";
                                                    $result = $conn->query($sql);
                                                    $data =  $result->fetch_assoc();
                                                    echo $data['total'];
                                                    ?> Vehicle Pending
                                                </div>
                                            </div>
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                    Rejected Registered Vehicles</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php
                                                    $sql = "SELECT COUNT(*) AS total from vehicles WHERE status = 'rejected'";
                                                    $result = $conn->query($sql);
                                                    $data =  $result->fetch_assoc();
                                                    echo $data['total'];
                                                    ?> Vehicle Rejected
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-users fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Total Plates Requested</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php
                                                    $sql = "SELECT COUNT(*) AS total from request";
                                                    $result = $conn->query($sql);
                                                    $data =  $result->fetch_assoc();
                                                    echo $data['total'];
                                                    ?> plates requested
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-money-check fa-2x text-gray-300"></i>
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

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

<?php include_once ('../includes/footer.php'); ?>