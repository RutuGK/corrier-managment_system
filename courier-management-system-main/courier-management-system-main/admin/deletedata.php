<!-- when admin click delete data link, page with filter options-->
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
    <h1 align='center'>Search Data Information</h1>
</div>

<div style="overflow-x:auto;">
<table width='100%' border="1px solid" style="margin-left: auto; margin-right:auto; margin-top:30px; font-weight:bold;border-spacing: 5px 5px;">
    <tr style="background-color: #cc9966;">
        <th> <h2>No. </h2></th>
        <th> <h2>Items Image </h2></th>
        <th> <h2>Sender Name </h2></th>
        <th> <h2>Receiver Name </h2></th>
        <th> <h2>Sender Email </h2></th>
        <th> <h2>Action </h2></th>
    </tr>

    <?php
    include('../dbconnection.php');

    $qryd= "SELECT * FROM `courier`";
    $run= mysqli_query($dbcon,$qryd);

    if(mysqli_num_rows($run)<1){
        echo "<tr><td colspan='6'>No record found..</td></tr>";
    }
    else{
        $count=0;
        while($data=mysqli_fetch_assoc($run))
        {
            $count++;
        ?>
        <tr align="center">
            <td><?php echo $count; ?></td>
            <td><img src="../dbimages/<?php echo $data['image']; ?>" alt="pic" style="max-width: 100px;"/> </td>
            <td><?php echo $data['sname']; ?></td>
            <td><?php echo $data['rname']; ?></td>
            <td><?php echo $data['semail']; ?></td>
            <td><a href="datadeleted.php?bb=<?php echo $data['billno']; ?>">Delete</a></td>
        </tr>
        <?php
        }
    }
    ?>
</table>
</div>
