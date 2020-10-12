<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
	include_once "PHPMailer.php";
	include_once "Exception.php";
	include_once "SMTP.php";
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$dept=$_POST['dept'];
$phone=$_POST['phone'];
$pc=$_POST['pc'];
$obj=$_POST['obj'];
$radios=$_POST['radios'];
$budget=$_POST['budget'];
$currency=$_POST['currency'];
$plan=$_POST['plan'];
$fc=$_POST['fc'];
$subject = "New CSV Form Submission";
$message = "".
"Email: $email" . "\n" .
"First Name: $fname" . "\n" .
"Last Name: $lname";
"Department: $dept" . "\n" .
"Phone: $phone" . "\n" .
"Preliminary Comment: $pc" . "\n" .
"Objectives: $obj" . "\n" .
"Research Approaches: $radios" . "\n" .
"Budget: $budget" . "\n" .
"Currency: $currency" . "\n" .
"Plan: $plan" . "\n" .
"Final Comments: $fc" . "\n" .

//The Attachment
$cr = "\n";
$data = "Email" . ',' . "First Name" . ',' . "Last Name" .','."Department" . ',' . "Phone" .','."Preliminary Comment" . ',' . "Objectives" .','."Research Approach" . ',' . "Budget" .','. "Currency" .','."Plan" . ',' . "Final Comment" . $cr;
$data .= "$email" . ',' . "$fname" . ',' . "$lname" .',' . "$dept" .',' . "$phone" . ',' . "$pc" .',' . "$obj" . ',' . "$radios" .',' . "$budget" . ','. "$currency" . ',' . "$plan" .',' . "$fc" . $cr;
$fp = fopen('newdatasubmission.csv','a');
fwrite($fp,$data);
fclose($fp);
$mail = new PHPMailer();

		//if we want to send via SMTP
		$mail->Host = "smtp.gmail.com";
		//$mail->isSMTP();
		$mail->SMTPAuth = true;
		$mail->Username = "example@domain.com"; //change this with your smtp email
		$mail->Password = "password"; //change this with your password
		$mail->SMTPSecure = "ssl"; //TLS
		$mail->Port = 465; //587

$mail->setFrom('example@domain.com'); //change this to smtp mail
    $mail->addAddress('destination@gmail.com'); // your destination mail
    $mail->addReplyTo(''); // optional(can keep it blank)

		
        // Add attachments
        $mail->addAttachment('newdatasubmission.csv');
        
        // Content
    $mail->isHTML(true);
    $mail->Subject = 'New Form Submission';
    $mail->Body    = 'You have new form submission! check attached file';
    $mail->AltBody    = 'You have new form submission! check attached file';

		if ($mail->send())
		    echo "<center><b>We have Recieved your Application, We will reach to you very soon. thank you!</b></center>";
		else
		    echo "<center><b>Error in Submitting the form. Please try again!</b></center>";
?>
