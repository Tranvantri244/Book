<?php
    require_once('dbhelper.php');
    $nameBook = $Author = $Price = $Producer  = '';

    if(!empty($_POST)){
        $Id = '';

    	if(isset($_POST['namebook'])){
    		$nameBook = $_POST['namebook'];
    	}
    	if(isset($_POST['author'])){
    		$Author = $_POST['author'];
    	}
    	if(isset($_POST['price'])){
    		$Price = $_POST['price'];
    	}
    	if(isset($_POST['producer'])){
    		$Producer = $_POST['producer'];
    	}
        if(isset($_POST['id'])){
            $Id = $_POST['id'];
        }

        $nameBook = str_replace('\'', '\\\'', $nameBook);
        $Author = str_replace('\'', '\\\'', $Author);
        $Price = str_replace('\'', '\\\'', $Price);
        $Producer = str_replace('\'', '\\\'', $Producer);
        $Id = str_replace('\'', '\\\'', $Id);

        if($Id != ''){
            $sql = "update book set name_Book = '$nameBook' , author = '$Author', price = '$Price', producer = '$Producer' where id = ".$Id;
        }else{
            $sql = "insert into book(name_Book, author, price, producer) value('$nameBook', '$Author', '$Price', '$Producer')";
        }
        execute($sql);
        header("Location: bookManagement.php");
        die();
    }
    $id = '';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = 'select * from book where id='.$id;
        $bookList = executeResult($sql);
        if($bookList != null && count($bookList) > 0){
            $row = $bookList[0];
            $nameBook = $row['name_book'];
            $Author = $row['author'];
            $Price = $row['price'];
            $Producer = $row['producer'];
        }else{
            $id = '';
        }
    }
?>


<!DOCTYPE html>
<html>
<head>
	<title>Input</title>
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
                <h2 class="text-center">Management Book</h2>
			</div>
			<div class="panel-body">

				<form method="post" action="">
					<div class="form-group">
					    <label for="namebook">Name Book :</label>	
					    <input type="number" name="id" value="<?=$id?>" style="display: none;">
					    <input required="true" type="text" class="form-control" id="namebook" name="namebook" value="<?=$nameBook?>">
				    </div>
                    <div class="form-group">
                    	<label for="author">Author :</label>
                    	<input required="true" type="text" class="form-control" id="author" name="author" value="<?=$Author?>">
                    </div>
                    <div class="form-group">
                    	<label for="price">Price :</label>
                    	<input required="true" type="number" class="form-control" id="price" name="price" value="<?=$Price?>">
                    </div>
                    <div class="form-group">
                    	<label for="producer">Producer :</label>
                    	<input required="true" type="text" class="form-control" id="producer" name="producer" value="<?=$Producer?>">
                    </div>
                    <button class="btn btn-success">Add book</button>
                    
				</form>
				
			</div>
        </div>
    </div>
</body>