
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  


<?php
include 'smtp/PHPMailerAutoload.php';
// Include the database configuration file
include 'db.php';
$statusMsg = '';

// File upload path
$targetDir = "useruploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    $title = $_POST['title'];
    $author = $_POST['author'];
    $email= $_POST['email'];
    $trans = $_POST['trans'];

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('doc','docx');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $conn->query("INSERT into ufiles (mtitle, email,aname, jdate , jfile,trans ) VALUES ('".$title."','".$email."','".$author."', NOW() ,'".$fileName."','".$trans."')");
                 
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";

                    $subject= "Manuscript recieved";
                    $txt= "Dear author
                    Your manuscript entitled ".$title." has been received to Indian Farmer ,an open access journal.


                    Thanks ";
                //$headers = "From: info@indianfarmer.net" ;
                                dialog($fileName);
                           // mail($email,$subject,$txt,$headers);
							
					echo smtp_mailer($email,$subject,$txt);
					

            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only .doc and docx files files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg;

function smtp_mailer($to,$subjects, $msg){
						$mail = new PHPMailer(); 
						//$mail->SMTPDebug=3;
						$mail->IsSMTP(); 
						$mail->SMTPAuth = true; 
						$mail->SMTPSecure = 'ssl'; 
						$mail->Host = "103.117.212.32";
						$mail->Port = "465"; 
						$mail->IsHTML(true);
						$mail->CharSet = 'UTF-8';
						$mail->Username = "info@indianfarmer.net";
						$mail->Password = 'jatinr33';
						$mail->SetFrom("info@indianfarmer.net");
						$mail->Subject = $subjects;
						$mail->Body =$msg;
						$mail->AddAddress($to);
						$mail->SMTPOptions=array('ssl'=>array(
							'verify_peer'=>false,
							'verify_peer_name'=>false,
							'allow_self_signed'=>false
						));
						if(!$mail->Send()){
							echo $mail->ErrorInfo;
						}else{
							echo 'Sent';
						}
					}
function dialog($file){
    
    
    echo '
    <script type="text/javascript">
    
    $(document).ready(function(){
    
        swal("Success!", "<B>Your Manuscript submitted successfully ,Please check your email spam folder for acknowledgent Email</b>", "success").then(function() {
            window.location = "index.php";
        });
    });
    
    </script>
    ';

}
?>