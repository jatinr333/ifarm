<?php


$mysqli = new mysqli("localhost:3306","jatinr","jatinr33","aavpubli_farm");

// Journals delete

if(isset($_GET['id']))
{
    $id=$_GET['id'];
     $sql = "DELETE FROM ufiles WHERE id='$id'";
     $mysqli->query($sql);
     echo 'Deleted successfully.';
     $file= "../uploads/".$_GET['file'];
     echo $file;
    unlink($file);
}

// Act as reviewer Delete

if(isset($_GET['actid']))
{
    $id=$_GET['actid'];
     $sql = "DELETE FROM actfiles WHERE id='$id'";
     $mysqli->query($sql);
     echo 'Deleted successfully.';
     $file= "../actuploads/".$_GET['file'];
     echo $file;
    unlink($file);
}

if(isset($_GET['urid']))
{
    $id=$_GET['urid'];
     $sql = "DELETE FROM authorcorrectedfiles WHERE id='$id'";
     $mysqli->query($sql);
     echo 'Deleted successfully.';
     $file= "../useruploads/".$_GET['file'];
     echo $file;
    unlink($file);
}
if(isset($_GET['rid']))
{
    $id=$_GET['rid'];
     $sql = "DELETE FROM reviewfiles WHERE id='$id'";
     $mysqli->query($sql);
     echo 'Deleted successfully.';
     $file= "../ruploads/".$_GET['file'];
     echo $file;
    unlink($file);
}
?>