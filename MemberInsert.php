<?php

$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');

if (!$con)

  {

  die('Connection has failed: ' . mysql_error());

  }
 
$sql= $con -> query("INSERT INTO member (ContactName, CompanyName, ContactEmail, Username, Password, CompanyCity, CompanyState, PhoneNumber, CompanyPicture, CompanyDescription, AccountVerified, AccessCode)

VALUES

('$_POST[ContactName]','$_POST[CompanyName]','$_POST[ContactEmail]','$_POST[Username]','$_POST[Password]','$_POST[CompanyCity]','$_POST[CompanyState]','$_POST[PhoneNumber]','$_POST[CompanyPicture]','$_POST[CompanyDescription]',false,null)");


/*
if (!query($sql,$con))

  {

  die('Error: ' . mysql_error());

  }
*/
$Subject = "Verify Account For User " . $_POST['Username'];
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
                                            <td align="center" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding">We wanted to be sure it was you that made this account. If it wasn\'t you, simply ignore this email and the account will be deleted within 5 days of this email being sent. Once you click the link below, you will be able to log into your new account for the FSU Innovation Center. We hope you will enjoy all the services are site will offer you whether you are a member company or a intern.</td>
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
                                                        <td align="center" style="border-radius: 3px;" bgcolor="#256F9C"><a href="localhost:8080/FSUInnovation/Verify.php" target="_blank" style="font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; border-radius: 3px; padding: 15px 25px; border: 1px solid #256F9C; display: inline-block;" class="mobile-button">Activate Your Account &rarr;</a></td>
                                                    </tr>
													<tr>
													     <td align="center" style="padding: 20px 0 0 0; font-size: 13px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding"><em>A small introduction about the Innovation Center from Mark Hardie, the director of the center about what sets us apart.</em></td>
													</tr>	 
														 <tr>
														 <td align="center" style="border-radius: 3px;" ><div class="fb-video" data-href="https://www.facebook.com/FSUInnovation/videos/341933539687515/?t=0" data-width="500" data-show-text="false"><blockquote cite="https://developers.facebook.com/FSUInnovation/videos/341933539687515/" class="fb-xfbml-parse-ignore"><a href="https://developers.facebook.com/FSUInnovation/videos/341933539687515/">Entrepreneur Innovation Center</a><p>Learn about what makes us unique in a way that allows us to educate our student interns with valuable hands-on experience! And a thank you to Access Framingham for doing a story and getting video of the center!</p>Posted by <a href="https://www.facebook.com/FSUInnovation/">Entrepreneur Innovation Center</a> on Wednesday, October 24, 2018</blockquote></div></td>
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
                        <a href="localhost:8080/FSUInnovation/Verify.html" target="_blank" style="color: #666666; text-decoration: none;">View this email in your browser to see video</a>
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
$textMsg = "This is a message from the FSU Entrepreneur Innovation Center. Open a browser to view the contents of this email fully. This is a Email Verification message to prove that you are not a robot.";
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
}
/*$loader = require_once(__DIR__.'/../vendor/autoload.php');
$configuration = new \ElasticEmailAPI\src\ElasticEmailClient\ApiConfiguration([
	'apiUrl' => $url,
	'apiKey' => 'a413a47a-66d3-416a-b3b6-ead3a85e3fb4'
]);
$client = new \ElasticEmailAPI\src\ElasticEmailClient\ElasticClient($configuration);
$clientData = $client->Account->Load();
*/
header("location: Success.php");
/*echo "*Success! Welcome to our website. Hope our services will serve you and your company well.";*/

 

//$con = null;

?>

</body>

</html>