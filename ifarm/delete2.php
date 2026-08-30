<?php


$mysqli = new mysqli("localhost:3306","jatinr","jatinr33","aavpubli_farm");

// Journals delete


// Cuurrent issures delete
if(isset($_GET['id']))
{
    $id=$_GET['id'];
     $sql = "DELETE FROM currentfiles WHERE id='$id'";
     $mysqli->query($sql);
     echo 'Deleted successfully.';
     $file= "../uploads/".$_GET['file'];
     echo $file;
    unlink($file);
}

if(isset($_GET['uid']))
{
    $id=$_GET['uid'];
     $sql = "DELETE FROM ufiles WHERE id='$id'";
     $mysqli->query($sql);
     echo 'Deleted successfully.';
     $file= "../useruploads/".$_GET['file'];
     echo $file;
    unlink($file);
}
?>