<!-- admin dashbord page with options for admin -->

<?php
session_start();
if(isset($_SESSION['uid'])){
    echo "";
}else{
    header('location: ../login.php');
}

?>

<?php
include('head.php');
?>

<style>
    body {
            margin: 0; 
            padding: 0;
            background-image: url('../images/15.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            height: 100vh; 
        }
</style>


<div class="admintitle">
    <div>
    <h4 ><a href="../index.php" style="float: left; margin-left:20px; color:aliceblue;">Login as user</a></h4>
    <h4 ><a href="logout.php" style="float: right; margin-right:20px; color:aliceblue;">Log Out</a></h4>
    </div>
    <h1 align='center' style="text-shadow: 0.1em 0.1em 0.15em #86592d;">Welcome To Admin Dashbord</h1>
</div>
<div align="center" style="margin-top:140px;">
<form style="position: center;color:lightblue;font-weight:bold;font-size:40px">
    
    <!-- <a href="insertdata.php">Insert Data</a><br><br> -->

    <!-- <a href="updatedata.php">Update Data</a><br><br> -->

    <a href="deletedata.php" style="color: #996633;">Delete Data</a><br><br>

    <a href="deleteusers.php" style="color: #996633;">Delete Users</a><br><br>
</form>

</div>
</body>
</html>