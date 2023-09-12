<?php

include("conn.php");

$cid = $_POST['state_id'];
$query = "select * from city where state_id = $cid";
 $result = mysqli_query($conn, $query);
$record= "";
foreach($result as $row){


    $record = "<option>$row[city_name]</option>";
    echo $record;
}

?>