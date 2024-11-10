
<?php

error_reporting(E_ALL);
try{
    //connection to database
    include('../database and tables/create_database.php');
    //sql to delete record for single row
    $id = $_GET['rej_id'];
      $delete_req = "DELETE from Student_request_details where id= '$id'";
    if(mysqli_query($connect,$delete_req)){
        header('location:./std_request_accept.php');
    } else {
        echo 'Failed to delete product';
    }
}catch(Exception $ex){
    die('Database Error: ' . $ex->getMessage());
}

?>