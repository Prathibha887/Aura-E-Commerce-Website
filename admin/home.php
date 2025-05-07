<?php
session_start();
if(isset($_SESSION['aurauser']))
{
	$aurauser=$_SESSION['aurauser'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aura</title>

    <!--===================== FONT AWESOME ===========================-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    

    <!--===================== CSS STYLE ===================-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">


    <link rel="stylesheet" href="adminsstyle.css"/>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
    <!---==================== DASHBOARD ============================-->
    <section class="menu">
        <div class="logo">
            <!-- <img src="images/aura1.png" alt="" class="logo-img" > -->
            <h2>Aura</h2>
        </div>
        <div class="items">
            <li><i class="fad fa-home"></i><a href="#">Dashboard</a></li>
            <li><i class="fad fa-tags"></i><a href="category.php">Category</a></li>
            <li><i class="fas fa-th-large"></i><a href="propular.php">Popular</a></li>
            <li><i class="fas fa-edit"></i><a href="products.php">Products</a></li>
            <li><i class="fa fa-sign-out"></i><a onclick="window.location.href='logout.php'">Logout</a></li>
        </div>
    </section>

    <!--========================= MAIN INTERFACE ===================-->
    <section class="interface">
        <div class="navigation">
         <i class="fas fa-bars" id="menu-btn"></i>
        </div>
        <h3 class="i-name">
            Dashboard
        </h3>
        <?php
        include 'config.php';
if (isset($_POST['add_submit'])) {

    $adminname = addslashes(trim($_POST['adminname']));
    $email = addslashes(trim($_POST['email']));
    $password = addslashes(trim($_POST['password']));
    
    $insertQuery = "INSERT INTO admin (adminname, password, email) VALUES ('$adminname', '$password', 
    '$email')";

    if (mysqli_query($con, $insertQuery)) {

        echo "<script>alert('Admin  added successfully');location.href='home.php'</script>";
    } else {
        echo "<script>alert('Unable to process your request!');location.href='home.php'</script>";
    }
    
}

if (isset($_POST['update'])) {
    $admin_id = $_POST['admin_id'];  
    $adminname = addslashes(trim($_POST['adminname']));
    $email = addslashes(trim($_POST['email']));
    $password = addslashes(trim($_POST['password']));
    
    echo "admin_id: $admin_id, adminname: $adminname, email: $email, password: $password";  // Debugging line

    $updateQuery = "UPDATE admin SET adminname = '$adminname', email = '$email', password = '$password' 
                    WHERE admin_id = '$admin_id'";
    
    // Debugging line: check if the query is correct
    echo "Update Query: " . $updateQuery;  
    
    if (mysqli_query($con, $updateQuery)) {
        echo "<script>alert('Admin updated successfully');location.href='home.php';</script>";
    } else {
        echo "<script>alert('Unable to process your request!');location.href='home.php';</script>";
        echo "Error: " . mysqli_error($con);  // Output MySQL error if the query fails
    }
}    

if (isset($_POST['delete_submit'])) {
    include 'config.php';


    if (mysqli_query($con, "DELETE from admin WHERE admin_id = '$_POST[delete_id]'")) {

        echo "<script>alert('Admin deleted successfully');location.href='home.php'</script>";
    } else {

        echo "<script>alert('Unable to process your request!');location.href='home.php'</script>";
    }
}
?>
        <div class="values">
            <div class="val-box">
                <h4 class="admin_title">Add Admins</h4>
               <!-- Modal Trigger Button -->
               <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add Admin
            </button>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" >
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Admin Name:</label>
                            <input type="text" class="form-control" id="recipient-name" name="adminname">
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-form-label">Password:</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="add_submit" class="btn btn-primary">Add</button>
                </div>
            </div>
            </form>
            </div>
            </div>

            </div>
        </div>
        <div class="board">
            <table width="100%">
                <thead>
                
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Actions</th>
                    </tr>
                    
                </thead>
                <tbody>
                <?php

include 'config.php';

$sql1 = "select * from admin";

$result1 = mysqli_query($con,$sql1);

$num1=mysqlI_num_rows($result1);

$sl=0;

if($num1 > 0)

{

while($row1 = mysqli_fetch_array($result1))

{

$sl+=1;

$admin_id=$row1[0];

$adminname=$row1['adminname'];
$password=$row1['password'];
$email=$row1['email'];



?>
                    <tr>
                        <td class="people"><?php echo $adminname; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $password; ?></td>
                        <td><form action="#" method="post">
                        <input type="text" name="delete_id" value="<?php echo $admin_id; ?>" hidden="true">
                            <button type="submit" class="delete_submit" name="delete_submit" onClick="return confirm('Are you sure you want to delete?')"><i class="fas fa-edit delete"></i></button>
                            <button type="button" data-bs-toggle="modal" data-bs-target='#update<?php echo $admin_id; ?>' class="update" name="update"><i class="fas fa-edit change"></i></button>
                            </form>
                        </td>
                            <!-- <td><button type="button" class="btn btn-primary">Primary</button></td> -->
                    </tr>

                    <div class="modal fade" id="update<?php echo $admin_id; ?>" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
        <div class="modal-dialog">
            
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addLabel">Update Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post">
    <div class="modal-body">
        <div class="modal-row">
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Admin Name:</label>
                <input type="text" class="form-control" id="recipient-name" name="adminname" value="<?php echo $adminname; ?>" required>
            </div>
            <div class="form-group">
                <label for="password" class="col-form-label">Password:</label>
                <input type="password" class="form-control" id="password" name="password" value="<?php echo $password; ?>" required>
            </div>
            <div class="form-group">
                <label for="email" class="col-form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <input autocomplete="off" type="hidden" name="admin_id" value="<?php echo $admin_id; ?>" />
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
    </div>
</form>

            </div>
            
            </div>
            </div>
            <?php

}

}

?>
                </tbody>
            </table>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Optional: You can handle modal events here if needed.
        // Example: Show or hide modal based on certain conditions
    </script>

<script>
    $('#menu-btn').click(function(){
        $('.menu').toggleClass("active");
    })
</script>



</body>
</html>
