<?php include_once ('../includes/header.php'); ?>

<?php include_once ('topbar.php');

$view = $_GET['view'];

if (isset($_POST['submit'])) {

    $rep_id = $conn -> real_escape_string($_POST['rep_id']);
    $feedback = $conn -> real_escape_string($_POST['feedback']);

    $query = "UPDATE reports SET ";
    $query .= "feedback  = '{$feedback}', ";
    $query .= "stolen_status  = 'responded' ";
    $query .= "WHERE report_id = $rep_id ";

    $update_query = mysqli_query($conn, $query);
    if (!$update_query) {
        die("Query failed" . mysqli_error($conn));
    }

}




$sql = "SELECT * FROM  reports WHERE report_id = $view";
$result = $conn->query($sql);

$row = $result->fetch_assoc();

$report_id = $row["report_id"];
$make_model = $row["make_model"];
$colors = $row["colors"];
$add_description = $row["add_description"];
$how_stolen = $row["how_stolen"];
$date_stolen = $row["date_stolen"];
$ownership = $row["ownership"];
$contact_name = $row["contact_name"];
$phone_numbers = $row["phone_numbers"];
$stolen_status = $row["stolen_status"];
$feedback = $row["feedback"];





?>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Content Row -->
        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-9 col-lg-9">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">View Stolen Car Information</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header font-weight-bold">RPTNo:00<?php echo $view; ?></div>
                                    <div class="card-body">
                                        <div class="mb-2 ng-binding">
                                            <span class="font-weight-bold text-dark">Contact Name :</span> <?php echo $contact_name .' ('. $ownership .')'; ?>
                                        </div>
                                        <div class="mb-2 ng-binding">
                                            <span class="font-weight-bold text-dark"> Contact Number :</span> <?php echo $phone_numbers; ?>
                                        </div>
                                        <hr>
                                        <div class="mb-2 ng-binding">
                                            <span class="font-weight-bold text-dark">Vehicle Make & Model :</span> <?php echo $make_model; ?>
                                        </div>
                                        <div class="mb-2 ng-binding">
                                            <span class="font-weight-bold text-dark"> Colors :</span> <?php echo $colors; ?>
                                        </div>
                                        <div class="mb-2 ng-binding bg-light">
                                            <span class="font-weight-bold text-dark">Additional Description :</span> <?php echo $add_description; ?>
                                        </div>
                                        <div class="mb-2 ng-binding bg-light">
                                            <span class="font-weight-bold text-dark">How It was Stolen :</span> <?php echo $how_stolen; ?>
                                        </div>
                                        <small class="text-muted text-info">Date: <?php echo $date_stolen; ?></small>
                                        <br>
                                        <div class="mb-2 ng-binding bg-light">
                                            <p class="font-weight-bolder">
                                                <?php
                                                if ($stolen_status === "responded") {
                                                    echo "<p class='info'> Status : $stolen_status </p>";
                                                }elseif($stolen_status === "done") {
                                                    echo "<p class='text-success'> Status : $stolen_status </p>";
                                                }
                                                else {
                                                    echo "<p class='text-warning font-weight-bolder'> Status : $stolen_status </p>";
                                                }
                                                ?>
                                            </p>
                                        </div>

                                        <ul class="list-group">
                                            <li class="list-group-item">Feedback : <?php echo $feedback ?></li>

                                        </ul>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h6 class="font-weight-bolder">Responses</h6>
                                <ul class="list-group">

                                    <form action="" method="post">
                                        <input type="hidden" name="rep_id" value="<?php echo $report_id ?>">
                                        <div class="form-group">
                                            <input type="text" name="feedback" class="form-control" placeholder="Feedback:">
                                        </div>
                                        <div class="mt-3">
                                            <button type="submit" name="submit" class="btn btn-primary float-right">Submit</button>
                                        </div>
                                    </form>
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