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
            <div class="form login">
                <span class="title">Login</span>
                <form action="#" method="post">
                    <div class="input-field">
                    <input type="email" placeholder="Enter your email" name="email" required>
                    <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                    <input type="text" id="password" class="password" name="password" placeholder="Enter your password" required>
                    <i class="uil uil-lock icon"></i>
                    <i id="toggler"class="far fa-eye showHidePw"></i>
                    <!-- <i id="toggler" class="uil uil-eye-slash showHidePw"></i> -->
                    </div>
                    
                    <div class="input-field button">
                        <input type="submit" value="Login Now" id="btn" name="login" onclick="window.location.href='home.php';" required>
                        </div>
                </form>
                <?php
if(isset($_POST['login']))
{
	error_reporting(1);
	include("config.php");
	
	$email=$_POST['email'];
	$password=$_POST['password'];
	
	$sql = "select * from admin where email='".$email."' and password='".$password."'";
	$result = mysqli_query($con,$sql);
	$count=mysqlI_num_rows($result);


	if($count>0)
	{
		session_start();
		$_SESSION['aurauser']=$email;
		$uid=$_SESSION['aurauser'];
		echo "<script>
				alert('Login Successful $uid');
			</script>";
		echo "<script> location.href='home.php'; </script>";
	}
	else
	{
		
		echo "<script>
				alert('Invalid Email or Password');
			</script>";
	}
}

?>
             
        </div>
        <script>
            var password = document.getElementById('password');
          var toggler = document.getElementById('toggler');
          showHidePassword = () => {
          if (password.type == 'password') {
          password.setAttribute('type', 'text');
          toggler.classList.add('fa-eye-slash');
          } else {
          toggler.classList.remove('fa-eye-slash');
          password.setAttribute('type', 'password');
          }
          };
          toggler.addEventListener('click', showHidePassword);
          </script>
        <!-- <script src="scripts.js"></script> -->

</body>
</html>
   
   