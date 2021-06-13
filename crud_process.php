<?php

session_start(); 

$mysqli = new mysqli('localhost','root','','wonderland') or die(mysqli_error($mysqli));
$id=0;
$update = false;
$package = '';
$price = '';
$description = '';
$image = '';

if(isset($_POST['save'])){
    $package = $_POST['package'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_POST['image'];

    $sql = "INSERT INTO `packages`(`packageName`, `description`, `price`, `imageURL`) VALUES ('$package','$description','$price','$image')";
    
    $mysqli->query($sql) or die($mysqli->error);

    $_SESSION['message'] = "Package has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location: crud.php");

}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM packages WHERE packageId=$id") or die($mysqli->error());

    $_SESSION['message'] = "Package has been deleted!";
    $_SESSION['msg_type'] = "danger";
}

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $result = $mysqli->query("SELECT * FROM packages WHERE packageId=$id") or die($mysqli->error());
    $update = true;
    
        $row = $result->fetch_array();
        $package = $row['packageName'];
        $price = $row['price'];
        $decription = $row['description'];
        $image = $row['imageURL'];
    
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $package = $_POST['package'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_POST['image'];

    $mysqli->query("UPDATE packages SET `packageName`='$package', `price`='$price', `description`='$description', `imageURL`='$image' WHERE `packageId`=$id" )
    or die($mysqli->error);

    $_SESSION['message'] = "Package has been updated!";
    $_SESSION['msg_type'] = "warning";

    header('location: crud.php');

}

mysqli_close($mysqli);

?>