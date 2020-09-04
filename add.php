<?php
require_once('conn.php');
global $conn;


// Add item
if(isset($_POST['item_name'])){
    
    $item = $_POST['item_name'];

    $sql_search_item = mysqli_query($conn,"SELECT mobile FROM mobiles WHERE mobile = '$item' ");

    if(!$sql_search_item){
        die('Error with searching for item ' . mysqli_error($conn));
    }

    if(mysqli_num_rows($sql_search_item) == 0){

        if(!empty($item)){
        $sql_insert_into_db  = mysqli_query($conn,"INSERT INTO mobiles(mobile)VALUES('$item')");

            if(!$sql_insert_into_db){
                die('Error with inserting into db ' . mysqli_error($conn));
            }
         }
         header('location:index.php');
    }

}



?>