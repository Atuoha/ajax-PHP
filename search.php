<?php
require_once('conn.php');
global $conn;

$search = $_POST['search']; // From ajax in custom.js

if(!empty($search)){
$sql_search = mysqli_query($conn,"SELECT * FROM mobiles WHERE mobile LIKE '%$search%' ");

if(!$sql_search){
    die('Error with sql search query ' . mysqli_error($conn));
}

while($row =  mysqli_fetch_array($sql_search)){

    $name = $row['mobile'];
?>

    <li class="ml-5 lead"><?php echo $name ?></li>

<?php

}
}






?>