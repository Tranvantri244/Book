<?php
    require_once('dbhelper.php');
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
				<h2 class="text-center">Information Book</h2>
				<form method="get">
					<input type="text" name="search" class="form-control" style="margin-top: 15px; margin-bottom: 15px;" placeholder="Find by book">
				</form>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>STT</th>
							<th>Name Book</th>
							<th>Author</th>
							<th>Price</th>
							<th>Producer</th>
							<th width="60px"></th>
							<th width="60px"></th>
						</tr>
					</thead>
					<tbody>
					<?php
					    if(isset($_GET['search']) && $_GET['search'] != ''){
                    	$sql = 'select * from book where name_book like "%'.$_GET['search'].'%"';
                        }else{
                    	$sql = 'select * from book';
                        	
                        	}
                    $bookList = executeResult($sql);

                    $index = 1;
                    

                    foreach ($bookList as $row) {
                    	echo '<tr>
		                      	<td>'.($index++).'</td>
		                    	<td>'.$row['name_book'].'</td>
			                    <td>'.$row['author'].'</td>
			                    <td>'.$row['price'].'</td>
			                    <td>'.$row['producer'].'</td>
			                    <td><button class="btn btn-warning" onclick=\'window.open("inputBook.php?id='.$row['id'].'","_self")\'>Edit</button></td>
		                       	<td><button class="btn btn-danger" onclick="deleteBook('.$row['id'].')">Delete</button></td>
		                    </tr>';
                    }
		            ?>
					</tbody>
		        </table>
		        <button class="btn btn-success" onclick="window.open('inputBook.php', '_self')">Add Book</button>
		    </div>
		</div>
	</div>
    <script type="text/javascript">
    	function deleteBook(id){
    		option = confirm('Bạn có muốn xóa sinh viên này không ?');
    		if(!option ){
    			return;
    		}
    		console.log(id);
    		$.post('delete_book.php',{
    			'id' : id
    		},
            function(data){
            	alter(data)
            	location.reload()
            })
    	}
    </script>
</body>
</html>
