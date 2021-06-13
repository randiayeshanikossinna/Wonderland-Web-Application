<?php
session_start();
$_SESSION['message'] = '';
$mysqli = new mysqli('localhost','root','','wonderland');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_POST['password'] == $_POST['confirmpassword']) {
        $firstname = $mysqli->real_escape_string($_POST['firstname']);
        $lastname = $mysqli->real_escape_string($_POST['lastname']);
        $address = $mysqli->real_escape_string($_POST['address']);
        $telephone = $mysqli->real_escape_string($_POST['telephone']);
        $email = $mysqli->real_escape_string($_POST['email']);
        $password = $mysqli->real_escape_string($_POST['password']);

        $sql = "INSERT INTO `accounts`(`firstname`, `lastname`, `address`, `telephone`, `email`, `password`) VALUES ('$firstname','$lastname','$address','$telephone','$email','$password')";

        if($mysqli->query($sql) == true){
            $_SESSION['message'] = 'Registration successful!';
            header("location: index.html");
        }
        else{
            $_SESSION['message'] = "Account could not be created";
        }
    }
    else{
        $_SESSION['message'] = "Two passwords do not match!";
    }
}
?>



<!DOCTYPE html>
<html>

<head>
    <title>Wonderland Theme Park - Admin's Crud</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" href="packages.css" />
    <link href="style.css" rel="stylesheet" />


</head>

<body>
     
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-main">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="images/wonderland.png"></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse-main">
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="active" href="index.html">Home</a></li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

        <div class="module">
            <h1>Create an account</h1>

            <form class="form" action="register_form.php" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
                <div class="form-group">
                    <label for="firstname">First name</label>
                    <input class="form-control" type="text" placeholder="First name" name="firstname" required />
                </div>
                <div class="form-group">
                    <label for="lastname">Last name</label>
                    <input class="form-control" type="text" placeholder="Last name" name="lastname" required />
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input class="form-control" type="text" placeholder="Address" name="address" required />
                </div>
                <label for="address">Telephone</label>
                <input class="form-control" type="tel" placeholder="Telephone" name="telephone" required />
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="email" placeholder="Email" name="email" autocomplete="new-password"
                required />
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" placeholder="Password" name="password"
                autocomplete="new-password" required />
        </div>
        <div class="form-group">
            <label for="confirmpassword">Confirm password</label>
            <input class="form-control" type="password" placeholder="Confirm password" name="confirmpassword"
                required />
        </div>
        <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />



        </form>

    </div>




    </div>




</body>

</html>
