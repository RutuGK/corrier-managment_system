<?php

session_start();
if(isset($_SESSION['uid'])){
    echo "";
    }else{
    header('location: ../index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        body {
            margin: 0; 
            padding: 0; 
            background-image: url('../images/13.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            height: 100vh; 
        }
       
        #content {
            text-align: 
            font-weight: bold;
            font-family: 'Times New Roman', Times, serif;
            padding-top: 20%; /* Adjust the padding as needed */
            color: white; /* Change text color for better visibility */
        }
    </style>
</head>
<body>
    <?php include('header.php'); ?>
    <div align='center' style="font-weight: bold;font-family:'Times New Roman', Times, serif"><br>
        <h2>This is a Courier Management Service</h2>
        <h4>The fastest courier service of India</h4><br><br>
        <h3>DBMS MINI PROJECT</h3>
        <h6>By Pinnacle fourfold</h6>
    </div>
</body>
</html>