<?php


    $email_to = "matthew@thebayhorse.pub";
 
    $email_subject = "Share application from ".clean_string($_POST['name']);

    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }

    if (isset($_POST['addr']['addr6'])) {
	header("Location: http://thebayhorse.pub/oops/");
	die();
    }

    if(!isset($_POST['name']) ||
	!isset($_POST['email']) ||
	!isset($_POST['addr']['addr1']) ||
	!isset($_POST['shares'])) {
	header("Location: http://thebayhorse.pub/oops/");
	die();
    }

    $addr = "  ".$_POST['addr']['addr1']."\n";
    if (isset($_POST['addr']['addr2'])) {
	$addr .= "  ".$_POST['addr']['addr2']."\n";
    }
    if (isset($_POST['addr']['addr3'])) {
	$addr .= "  ".$_POST['addr']['addr3']."\n";
    }
    if (isset($_POST['addr']['addr4'])) {
	$addr .= "  ".$_POST['addr']['addr4']."\n";
    }
    if (isset($_POST['addr']['addr5'])) {
	$addr .= "  ".$_POST['addr']['addr5']."\n";
    }


    $msg = "Application:\n\n";
    $msg .= "Name: ".clean_string($_POST['name'])."\n";
    $msg .= "Email: ".clean_string($_POST['email'])."\n";
    $msg .= "Address:\n".clean_string($addr);
    $msg .= "No. shares: ".clean_string($_POST['shares'])."\n";

    $h = "From: ".$_POST['email']."\r\n";
    $h .= 'X-Mailer: PHP/' . phpversion();

    @mail($email_to, $email_subject, $msg, $h);
    header("Location: http://thebayhorse.pub/thanks/");
    die();


?>
