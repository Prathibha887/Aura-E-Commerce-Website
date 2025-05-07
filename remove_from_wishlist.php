<?php
session_start();
include 'config.php';

if (!isset($_SESSION['aurauser'])) {
    echo "<script>alert('Please log in first!'); window.location.href='login.php';</script>";
    exit();
}

$wishlist_id = $_POST['wishlist_id'];

$sql = "DELETE FROM wishlist WHERE id = ?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "i", $wishlist_id);

if (mysqli_stmt_execute($stmt)) {
    echo "<script>alert('Removed from Wishlist!'); window.location.href='wishlist.php';</script>";
} else {
    echo "<script>alert('Error removing item!'); window.location.href='wishlist.php';</script>";
}

mysqli_stmt_close($stmt);
mysqli_close($con);
?>
