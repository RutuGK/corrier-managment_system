<?php

require_once "dbconnection.php";
require_once "session.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $qry = "SELECT * FROM `login` WHERE `email`='$email' AND `password`='$password'";
    $run = mysqli_query($dbcon, $qry);
    $row = mysqli_num_rows($run);
    if ($row < 1) {
?>
        <script>
            alert("Opps! Plz Enter Your Username and Pswd again..");
            window.open('index.php', '_self');
        </script> <?php
                } else {
                    $data = mysqli_fetch_assoc($run);
                    $id = $data['u_id'];    //fetch id value of user
                    $email = $data['email'];
                    $_SESSION['uid'] = $id;   //now we can use it until session destroy
                    $_SESSION['emm'] = $email;
                    ?>
        <script>
            alert("Welcome");
            window.open('home/home.php', '_self');
            // changes made here
        </script> <?php

                }
            }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('images/12.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            margin: 0; 
            padding: 0;
            height: 100vh;
            background-position: center;
            box-shadow: -3px -3px 9px #61eff9a2,
              3px 3px 7px rgba(118, 240, 249, 0.671);
        }
        .form-group .reset-password {
            background-color: #196666; /* Change background color of reset password button */
        }
    </style>
</head>

<body>
    <h1 align='center' style="margin: 15px; color:#004080;font-weight: bold;font-family:'Times New Roman', Times, serif">EXPRESS LANE LOGISTICS</h1>
    <hr />
    <h2 align='center' style="font-weight: bold;color:#196767;font-family:'Times New Roman', Times, serif">The Fastest Courier Service Ever</h2>
    <div>
        <h5><a href="admin/adminlogin.php" style="float: right; margin-right:40px; color:#196767; margin-top:0px">Admin Login</a></h5>
    </div>
    <div class="container" style="margin-top: 60px; width:40%; box-shadow: -3px -3px 9px #aaa9a9a2,3px 3px 7px rgba(147, 149, 151, 0.671);">
        <div class="row">
            <div class="col-md-12">
                <h2 style="color: #273c75;">Login</h2>
                <p style="color:#196767;">Please Fill Your details</p>
                <!-- <?php echo $error; ?> -->
                <form action="" method="post">
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter username/email Id" required />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary" value="SignIn" />
                        <button onclick="window.location.href='resetpswd.php'" class="btn btn-danger" style="cursor:pointer">Reset Password</button>
                    </div>
                    <p style="color: #196767;">Don't have an account?⮞➤ <a href="register.php">Register here</a>.</p>

                </form>
            </div>
        </div>
    </div>
</body>

</html>