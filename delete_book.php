<?php
    if(isset($_POST['id'])){
        $id = $_POST['id'];

        require_once('dbhelper.php');
        $sql = 'delete from book where id = '.$id;
        execute($sql);
        echo('Xóa sinh viên thành công');
    }
     	
     
?>