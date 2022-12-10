<?php include_once ('../includes/header.php'); ?>

<?php include_once ('topbar.php'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-11">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">All Stolen Cars</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <table class="table table-bordered table-sm">
                                        <thead>
                                        <tr>
                                            <th scope='col'>refno#: </th>
                                            <th scope='col'>make_model: </th>
                                            <th scope='col'>colors: </th>
<!--                                            <th scope='col'>additional Description: </th>-->
<!--                                            <th scope='col'>How It was Stolen: </th>-->
                                            <th scope='col'>Date: </th>
                                            <th scope='col'>Engine Number: </th>
                                            <th scope='col'>Ownership: </th>
                                            <th scope='col'>Contact Names: </th>
                                            <th scope='col'>Contact Numbers: </th>
                                            <th scope='col'>Stolen Status: </th>
<!--                                            <th scope='col'>Feedback: </th>-->
                                        </tr>
                                        </thead>
                                        <tbody>

<?php
$sql = "SELECT * FROM reports ORDER BY report_id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $report_id = $row["report_id"];
        $make_model = $row["make_model"];
        $colors = $row["colors"];
        $add_description = $row["add_description"];
        $how_stolen = $row["how_stolen"];
        $date_stolen = $row["date_stolen"];
        $ownership = $row["ownership"];
        $contact_name = $row["contact_name"];
        $phone_numbers = $row["phone_numbers"];
        $engine_number = $row["engine_number"];
        $stolen_status = $row["stolen_status"];
        $feedback = $row["date"];
     ?>

        <tr>
            <td>CVRSC00<?php echo $report_id ?></td>
            <td><?php echo $make_model ?></td>
            <td><?php echo $colors ?></td>
            <td><?php echo $date_stolen ?></td>
            <td><?php echo $engine_number ?></td>
            <td><?php echo $ownership ?></td>
            <td><?php echo $contact_name ?></td>
            <td><?php echo $phone_numbers ?></td>
            <td><?php
                if($stolen_status === "pending"){
                    echo "<p class='text-warning font-weight-bolder'>$stolen_status</p>";
                }elseif($stolen_status === "done"){
                    echo "<p class='text-success font-weight-bolder'>$stolen_status</p>";
                }else{
                    echo "<p class='text-info font-weight-bolder'>$stolen_status</p>";
                }
                ?></td>
            <td>
                <a href="view.php?view=<?php echo $report_id ?>" class="btn btn-success">view</a>
            </td>
        </tr>
            <?php
    }
} else {
    echo "<p class='text-danger'>No Stolen Vehicles</p>";
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