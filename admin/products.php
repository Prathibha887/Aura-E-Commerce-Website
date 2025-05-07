<?php
session_start();
if(isset($_SESSION['aurauser']))
{
	$aurauser=$_SESSION['aurauser'];

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
        <h2>Aura</h2>
        </div>
        <div class="items">
            <li><i class="fad fa-home"></i><a href="home.php">Dashboard</a></li>
            <li><i class="fad fa-tags"></i><a href="category.php">Category</a></li>
            <li><i class="fas fa-th-large"></i><a href="popular.php">Popular</a></li>
            <li><i class="fas fa-edit"></i><a href="#">Products</a></li>
            
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
if(isset($_POST['add_submit']))
{
	error_reporting(1);
	include("config.php");
    
    $categoryname = addslashes(trim($_POST['categoryname']));
    $productname = addslashes(trim($_POST['productname']));
    
    $price = addslashes(trim($_POST['price']));
		$fname = $_FILES["image"]["name"];
		$filename = $name.$fname;
		$tempname = $_FILES["image"]["tmp_name"];   
        $folder = "products/".$filename;
		
        if (move_uploaded_file($tempname, $folder))  
		{
			$query ="INSERT INTO products(image,categoryname,productname,price) VALUES('".$filename."',' ".$categoryname." ',' ".$productname." ',' ".$price." ')";
            mysqli_query($con, $query);
			echo "<script>
					alert(' uploaded Successfully');
				</script>";
			echo "<script> location.href='products.php'; </script>";
        }else{
            echo "<script>
					alert('Upload Failed,IMAGE should be less than 2GB');
				</script>";
		}
}
       
    
        
        


if (isset($_POST['update'])) {
    include("config.php");

    // Turn on error reporting for debugging purposes
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Sanitize and escape input data
    $id = $_POST['id'];
    $productname = mysqli_real_escape_string($con, $_POST['productname']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    
    $categoryname = mysqli_real_escape_string($con, $_POST['categoryname']); // Escape special characters
    $image = $_FILES["image"];

    // Check if a file was uploaded
    if ($image['error'] == 0) {
        $filename = $image['name'];
        $tempname = $image['tmp_name'];
        $folder = "products/" . $filename;

        // Move the uploaded file to the destination folder
        if (move_uploaded_file($tempname, $folder)) {
            // Update query to insert the new category name and image path into the database
            $query = "UPDATE products SET image = '$filename', categoryname = '$categoryname', productname = '$productname', price = '$price'  WHERE id = '$id'";

            if (mysqli_query($con, $query)) {
                echo "<script>alert('Products updated successfully!');</script>";
                echo "<script>location.href='products.php';</script>";
            } else {
                echo "<script>alert('Error updating Products in database!');</script>";
            }
        } else {
            echo "<script>alert('Image upload failed. Ensure the file is not too large (less than 2GB).');</script>";
        }
    } else {
        echo "<script>alert('No image uploaded or error in uploading.');</script>";
    }
}




if (isset($_POST['delete_submit'])) {
    include 'config.php';


    if (mysqli_query($con, "DELETE from products WHERE id = '$_POST[delete_id]'")) {

        echo "<script>alert('Product deleted successfully');location.href='products.php'</script>";
    } else {

        echo "<script>alert('Unable to process your request!');location.href='products.php'</script>";
    }
}
?>

        <div class="values">
            <div class="val-box">
                <h4 class="admin_title">Add Products</h4>
               <!-- Modal Trigger Button -->
               <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add Products
            </button>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <form method="post" action="#" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" enctype="multipart/form-data"></form>
                <div class="modal-body">
                    <div class="modal-row">
                        <div class="form-group">
                            <label for="img" class="col-form-label">Category Image:</label>
                            <input type="file" class="form-control" id="img" name="image">
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-form-label">Category Name:</label>
                            <input type="text" class="form-control" id="name" name="categoryname">
                        </div>
                        <div class="form-group">
                            <label for="pname" class="col-form-label">Product Name:</label>
                            <input type="text" class="form-control" id="pname" name="productname">
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-form-label">Price:</label>
                            <input type="text" class="form-control" id="price" name="price">
                        </div>
                       
                    </div>
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
                        
                        <th>Image</th>
                        <th>Category Name</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php

include 'config.php';

$sql1 = "select * from products";

$result1 = mysqli_query($con,$sql1);

$num1=mysqlI_num_rows($result1);

$sl=0;

if($num1 > 0)

{

while($row1 = mysqli_fetch_array($result1))

{

$sl+=1;

$id=$row1[0];

$categoryname=$row1['categoryname'];
$productname=$row1['productname'];
$price=$row1['price'];
$image=$row1['image'];


?>
                    <tr>
                        
                        <td><img  src="products/<?php echo $image; ?>" width="70" height="70" alt=""></td>
                        <td><?php echo $categoryname; ?></td>
                        <td><?php echo $productname; ?></td>
                        <td><?php echo $price; ?></td>
                        <td><form action="#" method="post">
                        <input type="text" name="delete_id" value="<?php echo $id; ?>" hidden="true">
                            <button type="submit" class="delete_submit" name="delete_submit" onClick="return confirm('Are you sure you want to delete?')"><i class="fas fa-edit delete"></i></button>
                            <button type="button" data-bs-toggle="modal" data-bs-target='#update<?php echo $id; ?>' class="update" name="update"><i class="fas fa-edit change"></i></button>
                            </form>
                        </td>
                    </tr>
                    <div class="modal fade" id="update<?php echo $id; ?>" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
        <div class="modal-dialog">
            
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addLabel">Update Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" enctype="multipart/form-data">
    <div class="modal-body">
        <div class="modal-row">
        <div class="form-group">
                            <label for="img" class="col-form-label">Category Image:</label>
                            <div>
        <!-- <img src="category/<?php echo $image; ?>" width="70" height="70" alt="Current Image"> -->
        <p>Current Image: <?php echo $image; ?></p>
    </div>
                            <input type="file" class="form-control" id="img"  name="image" value="<?php echo $image; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-form-label">Category Name:</label>
                            <input type="text" class="form-control" id="name" name="categoryname" value="<?php echo $categoryname; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="pname" class="col-form-label">Product Name:</label>
                            <input type="text" class="form-control" id="pname" name="productname" value="<?php echo $productname; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-form-label">Price:</label>
                            <input type="text" class="form-control" id="price" name="price" value="<?php echo $price; ?>" required>
                        </div>
                        
            
            <input autocomplete="off" type="hidden" name="id" value="<?php echo $id; ?>" />
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
<?php
}
else
{
	echo"<script>location.href='index.php';</script>";
}
?>