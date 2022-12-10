<li class="nav-item ">
    <a class="nav-link collapsed " href="index.php"><i class="fas fa-fw fa-user"></i>Profile   </a>
</li>
<li class="nav-item ">
    <a class="nav-link collapsed " href="your_vehicles.php"><i class="fas fa-fw fa-car"></i>Register Vehicle</a>
</li>
<li class="nav-item ">
    <a class="nav-link collapsed " href="plates.php"><i class="fas fa-fw fa-notes-medical"></i>Plates Status</a>
</li>
<li class="nav-item ">
    <a class="nav-link collapsed " href="notifications.php"><i class="fas fa-fw fa-notes-medical"></i>Notifications</a>
</li>
<li class="nav-item ">
    <a class="nav-link collapsed " href="payments.php"><i class="fas fa-fw fa-dollar-sign"></i>Online Payment</a>
</li>
<li class="nav-item ">
    <a class="nav-link collapsed " href="feedback.php"><i class="fas fa-fw fa-table"></i>Ask Questions</a>
</li>
<!--<li class="nav-item ">-->
<!--    <a class="nav-link collapsed " href="communication.php"><i class="fas fa-fw fa-rocket"></i>Communication</a>-->
<!--</li>-->

<li class="nav-item ">
    <a class="nav-link collapsed " href="../index.php?logout='logout'"><i class="fas fa-fw fa-reply"></i>Logout </a>
</li>


<?php
if(isset($_GET['logout'])){
    unset($_SESSION['owner_id']);
}
?>