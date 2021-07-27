<?php 
require_once('dbhelper.php');
if (isset($_COOKIE['status']) && $_COOKIE['status'] == 'success') {
    header('Location: bookManagement.php');
    die();
}

$listUser[]= array();

$sql= "SELECT * FROM `userr` ";

$listUser= executeResult($sql);

    $CheckEmail = $CheckPassword = '';

if (!empty($_POST)) {
    
    if (isset($_POST['CheckEmail']) && isset($_POST['CheckPassword'])) {

        foreach ($listUser as $user) {
              if (($user['email'] == $_POST['CheckEmail']) && ($user['password'] == $_POST['CheckPassword'])) {
            setcookie('status', 'success', time() + 300, '/');
            header('Location: bookManagement.php');
            die();    
        }
      
	}
}
}



 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<!-- <?=$checkoption?> -->
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading"> 
                <h2 class="text-center">Login </h2>
			</div>
			<div class="panel-body">

				<form method="post" >
					
                    <div class="form-group" >
                    	<label for="email" >Email  :</label>
                    	<input required="true" type="email" class="form-control" id="email" name="CheckEmail">
                    </div>
                    
                    <div class="form-group">
                    	<label for="pwd">Password : </label>
                    	<input required="true" type="password" class="form-control" id="pwd" name="CheckPassword">
                    </div>
                    <button type="submit" class="btn btn-success">Login</button>
                    <a href="singup.php" class="btn btn-success">Registration</a>
				</form>
				
			</div>
		</div>
	</div>

</body>
</html>
