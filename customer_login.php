<?php
session_start();
$_SESSION['message'] = '';
$mysqli = new mysqli('localhost','root','','wonderland');

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $username = $mysqli->real_escape_string($_POST['username']);
    $password = $mysqli->real_escape_string($_POST['password']);

    $sql = "SELECT email FROM accounts WHERE `email`='$username' and `password`='$password'";

    $result = $mysqli->query($sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    
    $count = mysqli_num_rows($result);

    if($count == 1){
        
        header("location: packages.php");
    }
    else{
        $_SESSION['message'] = "Password or username is incorrect!";
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
            <h1>Log in</h1>

            <form class="form" action="customer_login.php" method="post" enctype="multipart/form-data"
                autocomplete="off">
                <div class="alert alert-error">
                    <?= $_SESSION['message'] ?>
                </div>
                <div class="form-group">
                    <label for="username">Username (Email)</label>
                    <input class="form-control" type="text" placeholder="Username" name="username" required />
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" placeholder="Password" name="password"
                        autocomplete="new-password" required />
                </div>

                <input type="submit" value="Login" name="login" class="btn btn-block btn-success" />



            </form>

        </div>




    </div>




</body>

</html>