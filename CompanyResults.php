<style  type="text/css" media="screen">
ul  li{
  list-style-type:none;
}
</style>
<?php
  if(isset($_POST['submit'])){
  if(isset($_GET['go'])){
  if(preg_match("/^[  a-zA-Z]+/", $_POST['CompanyName'])){
  $Company=$_POST['CompanyName'];
  $con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');

  //-query  the database table
  $sql="SELECT  ID, FirstName, LastName FROM Contacts WHERE FirstName LIKE '%" . $Company .  "%' OR LastName LIKE '%" . $name ."%'";
  //-run  the query against the mysql query function
  $result=mysql_query($sql);
  //-create  while loop and loop through result set
  while($row=mysql_fetch_array($result)){
          $CompanyName  =$row['CompanyName'];
          $ContactName=$row['ContactName'];
          $ID=$row['MemberID'];
  //-display the result of the array
  echo "<ul>\n";
  echo "<li>" . "<a  href=\"CompanyResults.php?id=$ID\">"   .$CompanyName . " " . $ContactName .  "</a></li>\n";
  echo "</ul>";
  }
  }
  else{
  echo  "<p>Please enter a Company you are looking for</p>";
  }
  }
  }
?>