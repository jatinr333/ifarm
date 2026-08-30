<?php
include "header.php";

include '../db.php';
$statusMsg = '';
$targetDir = "../uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    $title = $_POST['title'];
    $pages= $_POST['pages'];
    $name= $_POST['name'];
    $date= $_POST['date'];
    $dcount= '1';
    

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('doc','docx','pub','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $conn->query("INSERT into currentfiles (title,cname,cfile,ctime,pages,dcount) VALUES ('".$title."','".$name."','".$fileName."','".$date."','".$pages."','".$dcount."')");
                 
            if($insert){
               // $statusMsg = "The file ".$fileName. " has been uploaded successfully.";

                //     $subject= "Journal recieved";
                //     $txt= "Recived your journal ";
                // $headers = "From: info@aavpublisher.com" ;
                             dialog($fileName);
                //             mail($authemail,$subject,$txt,$headers);

            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

 echo $statusMsg;


function dialog($file){
    
    
    echo '
    <script type="text/javascript">
    
    $(document).ready(function(){
    
        swal("Success!", "Your Journal '.$file.' Uploaded successfully", "success").then(function() {
            window.location = "publishing.php";
        });
    });
    
    </script>
    ';

}


?>  