<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="forms">
           

                <!--Registration Form-->

                <div class="form login">
                    <span class="title">Registration</span>
                    <form action="#" enctype="multipart/form-data" method="post">
                        <div class="user-details">
                        <div class="input-field">
                        <input type="text" placeholder="Enter your name" name="name" required>
                        <i class="uil uil-user"></i>
                        </div>
                        <div class="input-field">
                            <input type="email" placeholder="Enter your email" name="email" required>
                            <i class="uil uil-envelope icon"></i>
                            </div>
                            <div class="input-field">
                                <input type="tel" placeholder="Enter 10-digit number" name="contact"  pattern="^\d{10}$" required>
                                <i class="uil uil-phone"></i>
                                </div>
                        <div class="input-field">
                        <input type="password" id="password" class="password" placeholder="Enter your password" name="password" required>
                        <i class="uil uil-lock icon"></i>
                        <i id="toggler"class="far fa-eye showHidePw"></i>
                        
                        </div>
                        <div class="input-field">
                            <input type="text" placeholder="Enter your address" name="address" required>
                            <i class="uil uil-home"></i>
                        </div>
                
                        <div class="input-field button">
                            <input type="submit" value="Signup Now" id="btn"name="signup" required>
                            </div>
                        </div>
                    </form>
                    <div class="login-signup">
                        <span class="text">already a member?
                            <a href="index.php" class="text signup-text " >Login Now</a>
                        </span>
                    </div>
                    <?php

if(isset($_POST['signup']))

{

error_reporting(1);

include("config.php");

$email=$_POST['email'];

$sql = "select * from user_registration where email='".$email."'";

$result = mysqli_query($con,$sql);

$count=mysqlI_num_rows($result);
if($count>0)

{

echo "<script>

alert('There is an existing account associated with this email.');

</script>";

echo "<script> location.href='index.php'; </script>";

}

else

{

$name=$_POST['name'];

$email=$_POST['email'];

$contact=$_POST['contact'];

$password=$_POST['password'];
$address=$_POST['address'];

$query = "INSERT INTO user_registration(name,email,contact,password,address) VALUES('".$name."','".$email."','".$contact."','".$password."','".$address."')";

mysqli_query($con,$query) or die(mysqli_error($con));

echo "<script>

alert('Registeration Completed, Please Login.');

</script>";

echo "<script> location.href='login.php'; </script>";

}

}

?> 
       
        </div>
        <script src="scripts.js"></script>

</body>
</html>