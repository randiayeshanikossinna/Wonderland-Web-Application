<!DOCTYPE html>
<html>

<head>
    <title>Wonderlan Theme Park - Admin's Crud</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

    <?php require_once 'crud_process.php';?>

    <?php  if(isset($_SESSION['message'])): ?>

    <div class="alert alert-<?=$_SESSION['msg_type']?> ">
        <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        ?>
    </div>
    <?php endif ?>

    <div class="container">
        <button type="button" class="btn btn-dark" >
            <a href="index.html">Home</a></button>
        <h2>Admins View</h2>
        <h3>Package details</h3>
    <?php 
        $mysqli = new mysqli('localhost','root','','wonderland') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM packages") or die($mysqli_error);
        //pre_r($result);
    ?>

    <div class="row justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th>Package name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Image URL</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>

    <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['packageName']; ?></td>
                    <td> <?php echo $row['price']; ?></td>
                    <td>
                        <?php echo $row['description']; ?>
                    </td>
                    <td>
                        <?php echo $row['imageURL']; ?>
                    </td>
                    <td>
                        <a href="crud.php?edit=<?php echo $row['packageId']; ?> "
                            class="btn btn-info">Edit</a>
                        <a href="crud.php?delete=<?php echo $row['packageId']; ?> "
                            class="btn btn-danger">Delete</a>
                    </td>
                </tr>

    <?php endwhile; ?>

        </table>
    </div>

    <?php
        function pre_r( $array) {
            echo '<pre>';
            print_r($array);
            echo '<pre>';
        }


    ?>


    <div class="row justify-content-center">
        
        <form action="crud_process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>" >
            <div class="form-group">
                <label>Package name</label>
                <input type="text" name="package" class="form-control" value="<?php echo $package ?>" placeholder="Enter package name">
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" name="price" class="form-control" value="<?php echo $price ?>" placeholder="Enter package price">
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" name="description" class="form-control" value="<?php echo $description ?>" placeholder="Description">
            </div>
            <div class="form-group">
                <label>Image URL</label>
                <input type="text" name="image" class="form-control" value="<?php echo $image ?>" placeholder="Image URL">
            </div>
            <div class="form-group">
                <?php
                if($update == true):
                ?>
                 <button type="submit" class="btn btn-info" name="update">Update</button>
                <?php else: ?>
                <button type="submit" class="btn btn-primary" name="save">Save</button>
                <?php endif; ?>
            </div>
        </form>
    </div>
    </div>
</body>

</html>