<?php
session_start();
$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
if($_SESSION['UserType'] == "Member") {
	if ($_POST['PasswordOld'] != $_SESSION['Password'] and !Empty($_POST['PasswordNew'])) {
		header('Location: EditProfile.php?error=passcheck');
		die;
	}
	$adminps = $con -> query("SELECT * FROM admin WHERE AdminCode = '$_SESSION[Password]'");
	if(!Empty($_POST['PasswordNew'])) {
		if($adminps->rowCount() > 0) {
			$adminpsu = $con -> query("UPDATE admin SET AdminCode = '$_POST[PasswordNew]' WHERE AdminCode = '$_SESSION[Password]'");
		}
		$passchange = $con -> query("UPDATE member SET Password = '$_POST[PasswordNew]' WHERE Password = '$_SESSION[Password]'");
		}
	if(!Empty($_POST['Username'])) {
		$userchange = $con -> query("UPDATE member SET Username = '$_POST[Username]' WHERE Username = '$_SESSION[Username]'");
	}
	if(!Empty($_POST['Email'])) {

$Subject = "Verify New Email Address For User " . $_POST['Username'];
$To = $_POST['ContactEmail'];
$Sender = "FSU Entrepreneur Innovation Center";
$HTML_Message = '<!DOCTYPE html>

<html>
<head>
<title></title>
<!--

    An email present from your friends at Litmus (@litmusapp)

    Email is surprisingly hard. While this has been thoroughly tested, your mileage may vary.
    It\'s highly recommended that you test using a service like Litmus (http://litmus.com) and your own devices.

    Enjoy!

 -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<style type="text/css">
    /* CLIENT-SPECIFIC STYLES */
    body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;} /* Prevent WebKit and Windows mobile changing default text sizes */
    table, td{mso-table-lspace: 0pt; mso-table-rspace: 0pt;} /* Remove spacing between tables in Outlook 2007 and up */
    img{-ms-interpolation-mode: bicubic;} /* Allow smoother rendering of resized image in Internet Explorer */

    /* RESET STYLES */
    img{border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;}
    table{border-collapse: collapse !important;}
    body{height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important;}

    /* iOS BLUE LINKS */
    a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
    }

    /* MOBILE STYLES */
    @media screen and (max-width: 525px) {

        /* ALLOWS FOR FLUID TABLES */
        .wrapper {
          width: 100% !important;
            max-width: 100% !important;
        }

        /* ADJUSTS LAYOUT OF LOGO IMAGE */
        .logo img {
          margin: 0 auto !important;
        }

        /* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
        .mobile-hide {
          display: none !important;
        }

        .img-max {
          max-width: 100% !important;
          width: 100% !important;
          height: auto !important;
        }

        /* FULL-WIDTH TABLES */
        .responsive-table {
          width: 100% !important;
        }

        /* UTILITY CLASSES FOR ADJUSTING PADDING ON MOBILE */
        .padding {
          padding: 10px 5% 15px 5% !important;
        }

        .padding-meta {
          padding: 30px 5% 0px 5% !important;
          text-align: center;
        }

        .padding-copy {
             padding: 10px 5% 10px 5% !important;
          text-align: center;
        }

        .no-padding {
          padding: 0 !important;
        }

        .section-padding {
          padding: 50px 15px 50px 15px !important;
        }

        /* ADJUST BUTTONS ON MOBILE */
        .mobile-button-container {
            margin: 0 auto;
            width: 100% !important;
        }

        .mobile-button {
            padding: 15px !important;
            border: 0 !important;
            font-size: 16px !important;
            display: block !important;
        }

    }

    /* ANDROID CENTER FIX */
    div[style*="margin: 16px 0;"] { margin: 0 !important; }
</style>
</head>
<body style="margin: 0 !important; padding: 0 !important;">
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v4.0"></script>
<!-- HIDDEN PREHEADER TEXT -->
<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
    A Welcome From The FSU Innovation Center
</div>

<!-- HEADER -->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td bgcolor="#fffeeb" align="center">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
            <tr>
            <td align="center" valign="top" width="500">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" class="wrapper">
                <tr>
                    <td align="center" valign="top" style="padding: 15px 0;" class="logo">
                        <a href="http://fsuinnovation.byethost32.com/?i=1" target="_blank">
						<a href="https://photos.google.com/share/AF1QipPZjHsRPKqHzMYjvjzBV4IC6asO4W5IZHFurSGMKaMYVIVALu5CpmcJ20OMDrL8sg?key=clhPZDl6aFl2M21MampneEhqaHlQbjFUYVRFczd3&source=ctrlq.org"><img src="https://lh3.googleusercontent.com/raTeM8nZEUTSq_peQJfMnKIMM77VmBD6WINO3zjgclcp2Gs2_sYSxClLXZdQ4Kwoirdqbn7r_-iQMsOzpScitKjybySpdUXJLra83GI7BHzQk1y3iePWJ-A-oufNoYjrQv5WuhIu2Q=s200-p-k"  width="200" height="200" style="display: block; font-family: Helvetica, Arial, sans-serif; color: #ffffff; font-size: 16px;" border="0"/></a>
                        </a>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    <tr>
        <td bgcolor="#D8F1FF" align="center" style="padding: 70px 15px 70px 15px;" class="section-padding">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
            <tr>
            <td align="center" valign="top" width="500">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" class="responsive-table">
                <tr>
                    <td>
                        <!-- HERO IMAGE -->
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                  <td class="padding" align="center">
<a href="https://photos.google.com/share/AF1QipO1iRjNl9hJTEYUipTt5cIYIHUQB8PT88ILACQbBTso1RjOLt6aD7Y1z4nedOtasA?key=Z1h0a1paS2tSWm5yaGo4OHB3NnBka2p4NXZQTHNR&source=ctrlq.org"><img src="https://lh3.googleusercontent.com/7eGUUgFWTS8R0Hg4nWJFDVBYRvPms-ERe3nwI2lsAMtXVz2o4zlqVFw4vE3YDf6LRaMvO-VJ99CSEDOR9sb4aXqD3VAGCysBI6ioQZpU_iptK74kLYJzBC1yV23p9LEx7LHSUdeQ4g=w2400"  width="600" height="450" border="0" alt="Email Verification" style="display: block; padding: 0; color: #666666; text-decoration: none; font-family: Helvetica, arial, sans-serif; font-size: 16px;" class="img-max"/></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <!-- COPY -->
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td align="center" style="font-size: 25px; font-family: Helvetica, Arial, sans-serif; color: #333333; padding-top: 30px;" class="padding">Simply Click the Link Below</td>
                                        </tr>
                                        <tr>
                                            <td align="center" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding">You requested a signifigant change to your account such as a change in your email address. To verify it was you that made the request, we ask you to click the link below and verify the new address or other information you wish to use. Until this is done, your email address and/or other changes will remain the same.</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <!-- BULLETPROOF BUTTON -->
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td align="center" style="padding-top: 25px;" class="padding">
                                                <table border="0" cellspacing="0" cellpadding="0" class="mobile-button-container">
                                                    <tr>
                                                        <td align="center" style="border-radius: 3px;" bgcolor="#256F9C"><a href="localhost:8080/FSUInnovation/BotCheckEmail.php" target="_blank" style="font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; border-radius: 3px; padding: 15px 25px; border: 1px solid #256F9C; display: inline-block;" class="mobile-button">Allow Changes to Account &rarr;</a></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    <tr>
        <td bgcolor="#fffeeb" align="center" style="padding: 20px 0px;">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
            <tr>
            <td align="center" valign="top" width="500">
            <![endif]-->
            <!-- UNSUBSCRIBE COPY -->
            <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="max-width: 500px;" class="responsive-table">
                <tr>
                    <td align="center" style="font-size: 12px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color:#666666;">
                        360 Worcester Road, Framingham, MA 01701, USA
                        <br>
						Do not Reply to this Email
                        <span style="font-family: Arial, sans-serif; font-size: 12px; color: #444444;">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                        <a href="localhost:8080/FSUInnovation/AccountChange.html" target="_blank" style="color: #666666; text-decoration: none;">View this email in your browser to see video</a>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
</table>

</body>
</html>';
$textMsg = "This is a message from the FSU Entrepreneur Innovation Center. Open a browser to view the contents of this email fully. This is a Email Verification message to prove that you are not a robot trying to modify the email address of the relevant account.";
//$url = "https://api.elasticemail.com/v2/email/send?apikey=a413a47a-66d3-416a-b3b6-ead3a85e3fb4&from=innovation@framingham.edu&subject=" . $Subject . "&from=innovation@framingham.edu&to=" . $To . "&htmlMessage=" . $HTML_Message . "&textMessage=" . $textMsg . "&fromName=" . $Sender . "&charset=utf-8";
$url = "https://api.elasticemail.com/v2/email/send";
try {
	$info = array('from' => 'innovation@framingham.edu',
				  'fromName' => 'FSU Entrepreneur Innovation Center',
				  'apikey' => 'a413a47a-66d3-416a-b3b6-ead3a85e3fb4',
				  'subject' => $Subject,
				  'bodyHtml' => $HTML_Message,
				  'bodyText' => $textMsg,
				  'to' => $To,
				  'isTransactional' => false,
				  'charset' => 'utf-8');
	$c = curl_init();
	
	curl_setopt_array($c, array(
					  CURLOPT_URL => $url,
					  CURLOPT_POST => true,
					  CURLOPT_POSTFIELDS => $info,
					  CURLOPT_RETURNTRANSFER => true,
					  CURLOPT_HEADER => false,
					  CURLOPT_SSL_VERIFYPEER => false
	
	));
	$sendMail = curl_exec($c);
	curl_close($c);
	echo $sendMail;
}
catch(Exception $e){
	echo $e -> getMessage();
	header("location: EditProfile.php?error=emailfail");
	die;
}
$store = $con -> query("INSERT INTO emailtemp (EmailAddress, OriginalEmail) VALUES ('$_POST[ContactEmail]','$_SESSION[ContactEmail]')");
	}
	if(!Empty($_POST['CompanyCity'])) {
		$userchange = $con -> query("UPDATE member SET CompanyCity = '$_POST[CompanyCity]' WHERE ContactName = '$_SESSION[ContactName]'");
	}
	if(!Empty($_POST['CompanyState'])) {
		$userchange = $con -> query("UPDATE member SET CompanyState = '$_POST[CompanyState]' WHERE ContactName = '$_SESSION[ContactName]'");
	}
	if(!Empty($_POST['PhoneNumber'])) {
		$userchange = $con -> query("UPDATE member SET PhoneNumber = '$_POST[PhoneNumber]' WHERE PhoneNumber = '$_SESSION[PhoneNumber]'");
	}
	if(isset($_FILES['CompanyPicture'])) {
		if(!Empty($_FILES['CompanyPicture'])) {
			$img = $_FILES['CompanyPicture'];
			$filename = $img['tmp_name'];
			$openimg = fopen($filename, "r");
			$data = fread($openimg, filesize($filename));
			$pvars = array("image" => base64_encode($data));
			$timeout = 30;
			$icurl = curl_init();
			curl_setopt($icurl, CURLOPT_URL, 'https://api.imgbb.com/1/upload?key=83598d399901794c174deb5cfef74353');
			curl_setopt($icurl, CURLOPT_HEADER, false);
			curl_setopt($icurl, CURLOPT_TIMEOUT, $timeout);
			curl_setopt($icurl, CURLOPT_POST, true);
			curl_setopt($icurl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($icurl, CURLOPT_POSTFIELDS, $pvars);
			$upload = curl_exec($icurl);
			curl_close($icurl);
			echo $upload;
			$imgJSON = json_decode($upload);
			$imgLink = $imgJSON -> data -> display_url;
			$userchange = $con -> query("UDPATE member SET CompanyPicture = '$imgLink' WHERE CompanyPicture = '$_SESSION[CompanyPicture]'");
		}
	}
	
	if(!Empty($_POST['CompanyDescription'])) {
		$userchange = $con -> query("UPDATE member SET CompanyDescription = '$_POST[CompanyDescription]'");
	}
}
else if($_SESSION['UserType'] == "Intern"){
	if ($_POST['PasswordOld'] != $_SESSION['Password'] and !Empty($_POST['PasswordNew'])) {
		header('Location: EditProfile.php?error=passcheck');
		die;
	}
	$adminps = $con -> query("SELECT * FROM admin WHERE AdminCode = '$_SESSION[Password]'");
	if(!Empty($_POST['PasswordNew'])) {
		if($adminps->rowCount() > 0) {
			$adminpsu = $con -> query("UPDATE admin SET AdminCode = '$_POST[PasswordNew]' WHERE AdminCode = '$_SESSION[Password]'");
		}
		$passchange = $con -> query("UPDATE intern SET Password = '$_POST[PasswordNew]' WHERE Password = '$_SESSION[Password]'");
		}
	if(!Empty($_POST['Username'])) {
		$userchange = $con -> query("UPDATE intern SET Username = '$_POST[Username]' WHERE Username = '$_SESSION[Username]'");
	}
	if(!Empty($_POST['Email'])) {

$Subject = "Verify New Email Address For User " . $_POST['Username'];
$To = $_POST['EmailAddress'];
$Sender = "FSU Entrepreneur Innovation Center";
$HTML_Message = '<!DOCTYPE html>

<html>
<head>
<title></title>
<!--

    An email present from your friends at Litmus (@litmusapp)

    Email is surprisingly hard. While this has been thoroughly tested, your mileage may vary.
    It\'s highly recommended that you test using a service like Litmus (http://litmus.com) and your own devices.

    Enjoy!

 -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<style type="text/css">
    /* CLIENT-SPECIFIC STYLES */
    body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;} /* Prevent WebKit and Windows mobile changing default text sizes */
    table, td{mso-table-lspace: 0pt; mso-table-rspace: 0pt;} /* Remove spacing between tables in Outlook 2007 and up */
    img{-ms-interpolation-mode: bicubic;} /* Allow smoother rendering of resized image in Internet Explorer */

    /* RESET STYLES */
    img{border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;}
    table{border-collapse: collapse !important;}
    body{height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important;}

    /* iOS BLUE LINKS */
    a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
    }

    /* MOBILE STYLES */
    @media screen and (max-width: 525px) {

        /* ALLOWS FOR FLUID TABLES */
        .wrapper {
          width: 100% !important;
            max-width: 100% !important;
        }

        /* ADJUSTS LAYOUT OF LOGO IMAGE */
        .logo img {
          margin: 0 auto !important;
        }

        /* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
        .mobile-hide {
          display: none !important;
        }

        .img-max {
          max-width: 100% !important;
          width: 100% !important;
          height: auto !important;
        }

        /* FULL-WIDTH TABLES */
        .responsive-table {
          width: 100% !important;
        }

        /* UTILITY CLASSES FOR ADJUSTING PADDING ON MOBILE */
        .padding {
          padding: 10px 5% 15px 5% !important;
        }

        .padding-meta {
          padding: 30px 5% 0px 5% !important;
          text-align: center;
        }

        .padding-copy {
             padding: 10px 5% 10px 5% !important;
          text-align: center;
        }

        .no-padding {
          padding: 0 !important;
        }

        .section-padding {
          padding: 50px 15px 50px 15px !important;
        }

        /* ADJUST BUTTONS ON MOBILE */
        .mobile-button-container {
            margin: 0 auto;
            width: 100% !important;
        }

        .mobile-button {
            padding: 15px !important;
            border: 0 !important;
            font-size: 16px !important;
            display: block !important;
        }

    }

    /* ANDROID CENTER FIX */
    div[style*="margin: 16px 0;"] { margin: 0 !important; }
</style>
</head>
<body style="margin: 0 !important; padding: 0 !important;">
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v4.0"></script>
<!-- HIDDEN PREHEADER TEXT -->
<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
    A Welcome From The FSU Innovation Center
</div>

<!-- HEADER -->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td bgcolor="#fffeeb" align="center">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
            <tr>
            <td align="center" valign="top" width="500">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" class="wrapper">
                <tr>
                    <td align="center" valign="top" style="padding: 15px 0;" class="logo">
                        <a href="http://fsuinnovation.byethost32.com/?i=1" target="_blank">
						<a href="https://photos.google.com/share/AF1QipPZjHsRPKqHzMYjvjzBV4IC6asO4W5IZHFurSGMKaMYVIVALu5CpmcJ20OMDrL8sg?key=clhPZDl6aFl2M21MampneEhqaHlQbjFUYVRFczd3&source=ctrlq.org"><img src="https://lh3.googleusercontent.com/raTeM8nZEUTSq_peQJfMnKIMM77VmBD6WINO3zjgclcp2Gs2_sYSxClLXZdQ4Kwoirdqbn7r_-iQMsOzpScitKjybySpdUXJLra83GI7BHzQk1y3iePWJ-A-oufNoYjrQv5WuhIu2Q=s200-p-k"  width="200" height="200" style="display: block; font-family: Helvetica, Arial, sans-serif; color: #ffffff; font-size: 16px;" border="0"/></a>
                        </a>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    <tr>
        <td bgcolor="#D8F1FF" align="center" style="padding: 70px 15px 70px 15px;" class="section-padding">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
            <tr>
            <td align="center" valign="top" width="500">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" class="responsive-table">
                <tr>
                    <td>
                        <!-- HERO IMAGE -->
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                  <td class="padding" align="center">
<a href="https://photos.google.com/share/AF1QipO1iRjNl9hJTEYUipTt5cIYIHUQB8PT88ILACQbBTso1RjOLt6aD7Y1z4nedOtasA?key=Z1h0a1paS2tSWm5yaGo4OHB3NnBka2p4NXZQTHNR&source=ctrlq.org"><img src="https://lh3.googleusercontent.com/7eGUUgFWTS8R0Hg4nWJFDVBYRvPms-ERe3nwI2lsAMtXVz2o4zlqVFw4vE3YDf6LRaMvO-VJ99CSEDOR9sb4aXqD3VAGCysBI6ioQZpU_iptK74kLYJzBC1yV23p9LEx7LHSUdeQ4g=w2400"  width="600" height="450" border="0" alt="Email Verification" style="display: block; padding: 0; color: #666666; text-decoration: none; font-family: Helvetica, arial, sans-serif; font-size: 16px;" class="img-max"/></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <!-- COPY -->
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td align="center" style="font-size: 25px; font-family: Helvetica, Arial, sans-serif; color: #333333; padding-top: 30px;" class="padding">Simply Click the Link Below</td>
                                        </tr>
                                        <tr>
                                            <td align="center" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding">You requested a signifigant change to your account such as a change in your email address. To verify it was you that made the request, we ask you to click the link below and verify the new address or other information you wish to use. Until this is done, your email address and/or other changes will remain the same.</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <!-- BULLETPROOF BUTTON -->
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td align="center" style="padding-top: 25px;" class="padding">
                                                <table border="0" cellspacing="0" cellpadding="0" class="mobile-button-container">
                                                    <tr>
                                                        <td align="center" style="border-radius: 3px;" bgcolor="#256F9C"><a href="localhost:8080/FSUInnovation/BotCheckEmail.php" target="_blank" style="font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; border-radius: 3px; padding: 15px 25px; border: 1px solid #256F9C; display: inline-block;" class="mobile-button">Allow Changes to Account &rarr;</a></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    <tr>
        <td bgcolor="#fffeeb" align="center" style="padding: 20px 0px;">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
            <tr>
            <td align="center" valign="top" width="500">
            <![endif]-->
            <!-- UNSUBSCRIBE COPY -->
            <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="max-width: 500px;" class="responsive-table">
                <tr>
                    <td align="center" style="font-size: 12px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color:#666666;">
                        360 Worcester Road, Framingham, MA 01701, USA
                        <br>
						Do not Reply to this Email
                        <span style="font-family: Arial, sans-serif; font-size: 12px; color: #444444;">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                        <a href="localhost:8080/FSUInnovation/AccountChange.html" target="_blank" style="color: #666666; text-decoration: none;">View this email in your browser to see video</a>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
</table>

</body>
</html>';
$textMsg = "This is a message from the FSU Entrepreneur Innovation Center. Open a browser to view the contents of this email fully. This is a Email Verification message to prove that you are not a robot trying to modify the email address of the relevant account.";
//$url = "https://api.elasticemail.com/v2/email/send?apikey=a413a47a-66d3-416a-b3b6-ead3a85e3fb4&from=innovation@framingham.edu&subject=" . $Subject . "&from=innovation@framingham.edu&to=" . $To . "&htmlMessage=" . $HTML_Message . "&textMessage=" . $textMsg . "&fromName=" . $Sender . "&charset=utf-8";
$url = "https://api.elasticemail.com/v2/email/send";
try {
	$info = array('from' => 'innovation@framingham.edu',
				  'fromName' => 'FSU Entrepreneur Innovation Center',
				  'apikey' => 'a413a47a-66d3-416a-b3b6-ead3a85e3fb4',
				  'subject' => $Subject,
				  'bodyHtml' => $HTML_Message,
				  'bodyText' => $textMsg,
				  'to' => $To,
				  'isTransactional' => false,
				  'charset' => 'utf-8');
	$c = curl_init();
	
	curl_setopt_array($c, array(
					  CURLOPT_URL => $url,
					  CURLOPT_POST => true,
					  CURLOPT_POSTFIELDS => $info,
					  CURLOPT_RETURNTRANSFER => true,
					  CURLOPT_HEADER => false,
					  CURLOPT_SSL_VERIFYPEER => false
	
	));
	$sendMail = curl_exec($c);
	curl_close($c);
	echo $sendMail;
}
catch(Exception $e){
	echo $e -> getMessage();
	header("location: EditProfile.php?error=emailfail");
	die;
}
$store = $con -> query("INSERT INTO emailtemp (EmailAddress, OriginalEmail) VALUES ('$_POST[EmailAddress]','$_SESSION[EmailAddress]')");
	}
	if(!Empty($_POST['Major'])) {
		$userchange = $con -> query("UPDATE intern SET Major = '$_POST[Major]' WHERE InternName = '$_SESSION[InternName]'");
	}
	if(!Empty($_POST['School'])) {
		$userchange = $con -> query("UPDATE intern SET School = '$_POST[School]' WHERE InternName = '$_SESSION[InternName]'");
	}
	if(!Empty($_POST['GPA'])) {
		$userchange = $con -> query("UPDATE intern SET GPA = '$_POST[GPA]' WHERE InternName = '$_SESSION[InternName]'");
	}
	if(!Empty($_POST['City'])) {
		$userchange = $con -> query("UPDATE intern SET City = '$_POST[City]' WHERE InternName = '$_SESSION[InternName]'");
	}
	if(!Empty($_POST['State'])) {
		$userchange = $con -> query("UPDATE intern SET State = '$_POST[State]' WHERE InternName = '$_SESSION[InternName]'");
	}
	if(!Empty($_POST['PhoneNumber'])) {
		$userchange = $con -> query("UPDATE intern SET PhoneNumber = '$_POST[PhoneNumber]' WHERE PhoneNumber = '$_SESSION[PhoneNumber]'");
	}
	if(isset($_FILES['InternPhoto'])) {
		if(!Empty($_FILES['InternPhoto'])) {
			$img = $_FILES['InternPhoto'];
			$filename = $img['tmp_name'];
			$openimg = fopen($filename, "r");
			$data = fread($openimg, filesize($filename));
			$pvars = array("image" => base64_encode($data));
			$timeout = 30;
			$icurl = curl_init();
			curl_setopt($icurl, CURLOPT_URL, 'https://api.imgbb.com/1/upload?key=83598d399901794c174deb5cfef74353');
			curl_setopt($icurl, CURLOPT_HEADER, false);
			curl_setopt($icurl, CURLOPT_TIMEOUT, $timeout);
			curl_setopt($icurl, CURLOPT_POST, true);
			curl_setopt($icurl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($icurl, CURLOPT_POSTFIELDS, $pvars);
			$upload = curl_exec($icurl);
			curl_close($icurl);
			echo $upload;
			$imgJSON = json_decode($upload);
			$imgLink = $imgJSON -> data -> display_url;
			$userchange = $con -> query("UDPATE intern SET InternPhoto = '$imgLink' WHERE InternPhoto = '$_SESSION[InternPhoto]'");
		}
	}
	
	if(!Empty($_POST['SkillsAndExperience'])) {
		$userchange = $con -> query("UPDATE intern SET SkillsAndExperience = '$_POST[SkillsAndExperience] WHERE InternName = '$_SESSION[InternName]'");
	}
}
else {
	header("location: AccessDenied.php");
	die;
}
header("location: UpdateSuccess.php");
?>