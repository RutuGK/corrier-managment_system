<!-- admin logIn page and login logic -->
<?php

session_start();
if (isset($_SESSION['uid'])) {

    header('location: dashboard.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            background-image: url('../images/18.jpg'); /* Replace 'path/to/your/image.jpg' with the actual path to your background image */
            background-size: cover; /* Cover the entire background */
            background-position: center; /* Center the background image */
            background-repeat: no-repeat; /* Prevent background image from repeating */
            margin: 0; /* Remove default margin */
            padding: 0; /* Remove default padding */
            font-family: Arial, sans-serif; /* Optional: Set font family for text */
        }
        /* Additional styling for your content */
        .container {
            max-width: 400px; /* Adjust the maximum width of your content container */
            margin: auto; /* Center the container horizontally */
            padding: 20px; /* Add padding to the container */
            background-color: rgba(255, 255, 255, 0.8); /* Optional: Add a semi-transparent background color to the container */
            border-radius: 10px; /* Optional: Add border radius for rounded corners */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Optional: Add a subtle box shadow for depth */
        }
        /* Additional styling for your form elements */
        input[type="email"],
        input[type="password"],
        input[type="submit"] {
            width: 100%; /* Set the width of form inputs to fill the container */
            margin-bottom: 10px; /* Add spacing between form inputs */
            padding: 10px; /* Add padding to form inputs */
            border: 1px solid #ccc; /* Add border to form inputs */
            border-radius: 5px; /* Optional: Add border radius for rounded corners */
        }
        input[type="submit"] {
            background-color: #60401f; /* Set background color for submit button */
            color:#ecd9c5; /* Set text color for submit button */
            cursor: pointer; /* Change cursor to pointer on hover */
        }
        input[type="submit"]:hover {
            background-color: #0056b3; /* Change background color of submit button on hover */
        }
    </style>
</head>

<body bgcolor="#ecd9c6">
    <h4><a href="../index.php" style="float: right; margin-right:50px; color:black">Back To Home</a></h4><br>
    <h1 align='center' style="color: #60401f ;font-size:60px">Admin Zone</h1>
    <h2 align='center' style="color: #744d25;font-weight: bold;">Login for Pinnacle Fourfold</h2><br><br>
    <form action="adminlogin.php" method="POST" style="margin: auto;">
        <table align="center">
            <tr>
                <td>Email_ID:</td>
                <td><input type="email" name="uname" require></td>
            </tr>
            <tr><td><br></td></tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="pass" require></td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="login" value="Login" style="cursor: pointer;"></td>
            </tr>
        </table>
    </form>
</body>

</html>

<?php

include('../dbconnection.php');
if (isset($_POST['login'])) {
    $ademail = $_POST['uname'];
    $password = $_POST['pass'];
    $qry = "SELECT * FROM `adlogin` WHERE `email`='$ademail' AND `password`='$password'";
    $run = mysqli_query($dbcon, $qry);
    $row = mysqli_num_rows($run);
    if ($row < 1) {
        ?>
        <script>
            alert("Only admin can login..");
            window.open('adminlogin.php', '_self');
        </script><?php
    }
    else {
        $data = mysqli_fetch_assoc($run);
        $id = $data['a_id'];
        $_SESSION['uid'] = $id;
        header('location:dashboard.php');
    }
}
?>