<?php
include 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['aurauser'])) {
        echo "<script>alert('Please log in first!'); window.location.href='index.php';</script>";
        exit();
    }

    $email = $_SESSION['aurauser'];
    $id = $_POST['id'];
    $productname = $_POST['productname'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    // Check if the product is already in the wishlist for this email
    $check_sql = "SELECT * FROM wishlist WHERE email = '$email' AND id = '$id'";
    $check_result = mysqli_query($con, $check_sql);

    if (mysqli_num_rows($check_result) == 0) {
        // Insert the product into wishlist using email
        $insert_sql = "INSERT INTO wishlist (email, id, productname, price, image) 
                       VALUES ('$email', '$id', '$productname', '$price', '$image')";
        if (mysqli_query($con, $insert_sql)) {
            echo "<script>alert('Added to Wishlist!'); window.location.href='wishlist.php';</script>";
        } else {
            echo "<script>alert('Error adding to Wishlist!'); window.location.href='wishlist.php';</script>";
        }
    } else {
        echo "<script>alert('Already in Wishlist!'); window.location.href='wishlist.php';</script>";
    }
}
?>
