
<?php
error_reporting(E_ALL);
try{
    //connection to database
    include('../database and tables/create_database.php');
    $id = $_GET['id'];    
    //sql to delete record for single row
      $delete = "DELETE from Student_table where id= '$id'";
    if(mysqli_query($connect,$delete)){
       
        header('location:view students.php');
    } else {
        echo 'Failed to delete product';
    }
}catch(Exception $ex){
    die('Database Error: ' . $ex->getMessage());
}

?>