<?php 
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $mailFrom=$_POST['mail'];
    $phoneNo=$_POST['no'];
    $message=$_POST['msg'];

    $mailTo = "pradumnakadam07@gmail.com";
    $headers = "From: ".$mailFrom;
    $txt="You have a message" .$name".\n\n".$message;

    mail($mailTo,$name , $txt , $headers );
    header("Location: index.html?MessageSent");

}


?>