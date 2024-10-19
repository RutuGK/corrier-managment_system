<!-- when admin click delete user link, it displays all users with delete option -->
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

<div class="admintitle">
    <div>
    <h4 ><a href="dashboard.php" style="float: left; margin-left:20px; color:aliceblue;">Back To Dashboard</a></h4>
    <h4 ><a href="logout.php" style="float: right; margin-right:20px; color:aliceblue;">Log Out</a></h4>
    </div>
    <h1 align='center' >Showing All Users</h1>
</div>
<div style="overflow-x:auto;">
<table width='80%' border="1px solid" style="margin-left: auto; margin-right:auto; margin-top:30px; font-weight:bold;border-spacing: 5px 5px;">
    <tr style="background-color:#ebd9c6;">
        <th><h2>No.</h2></th>
        <th><h2>Users Name</h2></th>
        <th><h2>Email Id</h2></th>
        <th><h2>Action</h2></th>
    </tr>
    <?php

        include('../dbconnection.php');

        $qry= "SELECT * FROM `users`"; //AND `name` LIKE '%name%'
        $run= mysqli_query($dbcon,$qry);

        if(mysqli_num_rows($run)<1){
            echo "<tr><td colspan='6'>There is no Data in Database</td></tr>";
        }
        else{
            $count=0;
            while($data=mysqli_fetch_assoc($run))
            {
                $count++;
            ?>
            <tr align="center">
                <td><?php echo $count; ?></td>
                <td><?php echo $data['name']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td><a href="usersdeleted.php?emm=<?php echo $data['email']; ?>">DeleteUser</a></td>
            </tr>
            <?php
            }
        }


    
    ?>

</table>
</div>