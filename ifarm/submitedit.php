<?php
      include 'header.php';                                  
$username = "jatinr";
$password = "jatinr33";
$database = "aavpubli_farm";

$mysqli = new mysqli("localhost:3306", $username, $password, $database);

if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $title=$_POST['title'];
    $cname=$_POST['name'];
    $date=$_POST['date'];
    $pages=$_POST['pages'];


    $sql = "UPDATE currentfiles SET title='".$title."' , cname='".$cname."' , ctime='".$date."', pages='".$pages."' WHERE id='$id' ";
    if ($mysqli->query($sql) === TRUE) {
            dialog();
      } else {
        echo "Error updating record: " . $conn->error;
      }
      
      $conn->close();
}else{
    
    header("Location: index.php");
}
function dialog(){
    
    
    echo '
    <script type="text/javascript">
    
    $(document).ready(function(){
    
        swal("Success!", "Your Data Updated Successfully", "success").then(function() {
            window.location = "index.php";
        });
    });
    
    </script>
    ';

}

?>
