<?php include_once ('../includes/header.php'); ?>

<?php include_once ('topbar.php');
if (isset($_POST['submit'])) {

    $emp_id = $_POST['emp_id'];
    $score = $_POST['score'];
    $comment = $_POST['comment'];

    $query = "UPDATE employees SET ";
    $query .= "score  = '{$score}', ";
    $query .= "comment  = '{$comment}' ";
    $query .= "WHERE emp_id = $emp_id ";

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
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Vehicle Owners</h6>
<!--                        <a class="btn btn-primary justify-content-end" href="add_employee.php">Add New</a>-->
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <table class="table table-bordered table-sm">
                            <thead>
                            <tr>
                                <th scope='col'>V_O#: </th>
                                <th scope='col'>First Name: </th>
                                <th scope='col'>Last Name: </th>
                                <th scope='col'>Email: </th>
                                <th scope='col'>Address: </th>
                                <th scope='col'>National ID: </th>
                                <th scope='col'>DOB: </th>
                                <th scope='col'>Number Of Cars: </th>
                                <th scope='col'>Date Created: </th>
                                <th scope='col'> </th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            $sql = "SELECT * FROM vehicle_owners";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    $owner_id = $row["owner_id"];
                                    $first_name = $row["first_name"];
                                    $last_name = $row["last_name"];
                                    $email = $row["email"];
                                    $address = $row["address"];
                                    $national_id = $row["national_id"];
                                    $dob = $row["dob"];
                                    $date = $row["date"];
                                    ?>

                                    <tr>
                                        <td>VO0<?php echo $owner_id ?></td>
                                        <td><?php echo $first_name ?></td>
                                        <td><?php echo $last_name ?></td>
                                        <td><?php echo $email ?></td>
                                        <td><?php echo $address ?></td>
                                        <td><?php echo $national_id ?></td>
                                        <td><?php echo $dob ?></td>
                                        <td><?php echo "1" ?></td>
                                        <td><?php echo $date ?></td>
<!--                                        <td>-->
<!--                                            <a href="" class="btn btn-info btn-sm">view</a>-->
<!--                                        </td>-->

                                    </tr>

                                    <?php
                                }
                            } else {
                                echo "0 results";
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