 <?php
    require_once('dbhelper.php');

    $account = $email = $username =  $phone = $password = '';
    
    if(!empty($_POST)){
    	if(isset($_POST['account'])){
    		$account = $_POST['account'];
    	}if(isset($_POST['email'])){
    		$email = $_POST['email'];
    	}
    	if(isset($_POST['username'])){
    		$username = $_POST['username'];
    	}
    	if(isset($_POST['phone'])){
    		$phone = $_POST['phone'];
    	}
    	if(isset($_POST['password'])){
    		$password = $_POST['password'];
    	}
        if ($email != '' && $password != '') {
          $sql = "insert into userr(name_account, email,fullname ,phone, password) value ('$account', '$email', '$username', '$phone', '$password')";
          execute($sql);
          header('Location:login.php');
          die();
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
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading"> 
                <h2 class="text-center">Registration</h2>
			</div>
			<div class="panel-body">

				<form method="post" action="">
					<div class="form-group">
					    <label for="account">Name Account :</label>
					    
					    <input required="true" type="text" class="form-control" id="account" name="account" value="">
				    </div>
                    <div class="form-group">
                    	<label for="email">Email :</label>
                    	<input required="true" type="email" class="form-control" id="email" name="email" value="">
                    </div>
                    <div class="form-group">
                    	<label for="username">User name :</label>
                    	<input required="true" type="text" class="form-control" id="username" name="username" >
                    </div>
                    <div class="form-group">
                    	<label for="phone">Phone :</label>
                    	<input required="true" type="number" class="form-control" id="phone" name="phone" >
                    </div>
                    <div class="form-group">
                    	<label for="password">Password :</label>
                    	<input required="true" type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-success">Registration</button>
				</form>
				
			</div>
		</div>
	</div>

</body>
</html>