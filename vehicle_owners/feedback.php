<?php include_once ('../includes/header.php'); ?>

<?php include_once ('topbar.php'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-5 col-lg-4">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Send Message</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">

                        <?php
                        if(isset($_POST['submit'])){

                            $description = $conn -> real_escape_string($_POST['description']);
                            $date = $_POST['date'];

                            $sql = "INSERT INTO feedbacks (owner_id, description, date)
                            VALUES ('{$_SESSION['owner_id']}', '{$description}',now())";

                            if ($conn->query($sql) === TRUE) {

                                echo "<h4 class='alert alert-success'>Message sent</h4>";

                            }else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                        }
                        ?>

                        <form action="" method="post">
                            <div class="form-group">
                                <label for="description">Send Message :</label>
                                <textarea class="form-control" name="description"  rows="3" required></textarea>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Send</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-4">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Feedback</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="border border-primary">
                            <ul class="list-group">
<?php
$sql = "SELECT * FROM  feedbacks";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        $feed_id = $row["feed_id"];
        $description = $row["description"];
        $comment = $row["comment"];
        $date = $row["date"];
        ?>
                                <li class="list-group-item">
                                    <small><?php echo $date ?></small>
                                    <br>
                                    <p><?php echo $description ?></p>
                                    <p class="float-right font-italic"> <b class="font-weight-bold ">Response:</b>
                                        <?php echo $comment ?>
                                    </p>
                                </li>
           <?php
                                }
                            } else {
                                echo "0 results";
                            }
                         ?>
                            </ul>
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