<!-- Calls the Connection File -->
<!--Main Developer: Jonathan Petani, Co-Collaborators: Jessica Grady, Simone McHugh-->
<?php
include "db_connection.php";
$conn = OpenCon();
echo "Successful Connection!";
CloseCon($conn);
?>