<?php

include("conn.php");

$sid = $_POST['countryid'];
$query = "select * from state where country_id = $sid";
 $result = mysqli_query($conn, $query);
$record= "";
foreach($result as $row){


    $record = "<option value='$row[state_id]'>$row[state_name]</option>";
    echo $record;
}

?>