<?php
   ob_start();
   session_start();
   if ( ! empty( $_POST ) ) {
    if ( isset( $_POST['Username'] ) && isset( $_POST['Password'] ) ) {
        // Getting submitted user data from database
        $con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
        $stmt = $con->prepare("SELECT * FROM member WHERE Username = ?");
        $stmt->execute();
        $result = $stmt->fetchColumn();
    	$user = $result->fetch_object();
    		
    	// Verify user password and set $_SESSION
    	if ( password_verify( $_POST['Password'], $user->password ) ) {
    		$_SESSION['MemberId'] = $user->ID;
			
    	}
		else {
			header ("location: FailedLoginMember.html");
		}
    }
		else {
			header ("location: FailedLoginMember.html");
		}
}
else {
		header ("location: FailedLoginMember.html");
	 }
?>
?>