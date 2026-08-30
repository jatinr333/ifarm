<?php
include 'db.php';
if( $_GET["url"] && $_GET["id"] ){
    $url=$_GET["url"];
    $id=$_GET["id"];
    $dcount=$_GET["count"]+1;
    

    $insert = $conn->query("UPDATE currentfiles SET dcount = '".$dcount."' WHERE id = '".$id."'");
                 
            if($insert){
             
             header("Location: $url");
            }


}

?>

