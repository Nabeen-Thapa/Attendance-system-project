
<?php
$id = $_GET['id'];
    
error_reporting(E_ALL);
try{
    //connection to database
    include('../database and tables/create_database.php');
    //sql to delete record for single row
      $delete_batch = "DELETE from batch_table where id= '$id'";
    if(mysqli_query($connect,$delete_batch)){
       
        header('location:teacher_dashboard.php');
    } else {
        echo 'Failed to delete product';
    }
}catch(Exception $ex){
    die('Database Error: ' . $ex->getMessage());
}

?>