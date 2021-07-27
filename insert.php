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
    	
        if ($email == '' && $password == '') {
            echo 'cut';
        }else{
    	$sql = "insert into userr(name_account, email,fullname ,phone, password) value ('$account', '$email', '$username', '$phone', '$password')";
        execute($sql);
        header('Location :login.php');
        die();
    }
    }
   
?> 