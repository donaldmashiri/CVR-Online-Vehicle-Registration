<?php include_once ('../includes/header.php'); ?>

<?php include_once ('topbar.php');
if (isset($_POST['submit'])) {

    $feed_id = $_POST['feed_id'];
    $comment = $_POST['comment'];

    $query = "UPDATE feedbacks SET ";
    $query .= "comment  = '{$comment}' ";
    $query .= "WHERE feed_id = $feed_id ";

    $update_query = mysqli_query($conn, $query);
    if (!$update_query) {
        die("Query failed" . mysqli_error($conn));
    }
}


?>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-10 col-lg-9">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Feedbacks</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <table class="table table-bordered table-sm">
                            <thead>
                            <tr>
                                <th scope='col'>FD#: </th>
                                <th scope='col'>Fullnames: </th>
                                <th scope='col'>Description: </th>
                                <th scope='col'>Date: </th>
                                <th scope='col'>Feedback: </th>
                                <th scope='col'></th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            $sql = "SELECT * FROM feedbacks JOIN vehicle_owners ON feedbacks.owner_id = vehicle_owners.owner_id
                                    ";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    $feed_id = $row["feed_id"];
                                    $owner_id = $row["onwer_id"];
                                    $first_name = $row["first_name"];
                                    $last_name = $row["last_name"];
                                    $description = $row["description"];
                                    $date = $row["date"];
                                    $comment = $row["comment"];
                                    ?>

                                    <tr>
                                        <td>FD<?php echo $feed_id ?></td>
                                        <td><?php echo $first_name .' '. $last_name ?></td>
                                        <td><?php echo $description ?></td>
                                        <td><?php echo $date ?></td>
                                        <td><?php echo $comment ?></td>
                                        <form method="post" action="">
                                        <td>
                                             <input type="hidden" name="feed_id" value="<?php echo $feed_id ?>">
                                              <input type="text" name="comment" value="<?php echo $comment ?>" placeholder="Comment :">
                                        </td>
                                        <td>
                                            <button type="submit" name="submit" class="float-left mt-1 btn btn-outline-primary btn-sm">comment</button>
                                        </td>
                                        </form>
                                    </tr>

                                    <?php
                                }
                            } else {
                                echo "<p class='alert alert-danger'>No payments yet</p>";
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